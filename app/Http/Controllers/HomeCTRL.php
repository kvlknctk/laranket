<?php

    namespace App\Http\Controllers;

    use App\Option;
    use App\Poll;
    use App\Vote;
    use Illuminate\Http\Request;

    class HomeCTRL extends Controller
    {


        public function iletisim()
        {
            return view('iletisim');
        }

        public function index()
        {
            // burası yukarıdan 3
            $poll_id    = 1;
            $masterPoll = Poll::with('options', 'state')->find($poll_id);
            $polls = Poll::get();
            // Bu bize oturumda kullanıcının malum ankete oyu var mı diye kontrol edecek.
            $switch = $this->session_kontrol($poll_id);

            //Anketin toplamda kaç oyu var? diye maximum oy hesaplayacağız yüzde için.
            $sum = $masterPoll->options->sum('votes_count');


            return view('front.anket', compact('masterPoll', 'sum', 'switch', 'polls'));
        }


        public function anket($id)
        {
            $poll_id    = $id;
            $masterPoll = Poll::with('options')->find($poll_id);

            // Bu bize oturumda kullanıcının malum ankete oyu var mı diye kontrol edecek.
            $switch = $this->session_kontrol($poll_id);

            //Anketin toplamda kaç oyu var? diye maximum oy hesaplayacağız yüzde için.
            $sum = $masterPoll->options->sum('votes_count');


            return view('front.anket', compact('masterPoll', 'sum', 'switch'));
        }

        public function oy_ver(Request $request, $id)
        {

            $ip_address  = $request->ip();


            if ($this->ip_kontrol($ip_address, $id)) {
                $vote = Vote::create([
                    'option_id' => $id,
                    'ip'        => $ip_address
                ]);
            }else {
                return redirect()->back()->with('message', 'Daha önceden bu ankete oy kullanmışsınız. ');
            }



            $option = Option::with('poll')->find($id);
            $request->session()->push('user_votes', $option->poll->id);

            //$request->session()->push('user_votes', 4);


            return redirect()->back()->with('message', 'Oy Kullandınız.');
        }

        public function session_kontrol($poll_id)
        {

            $collection = collect(session()->get('user_votes'));
            $vars       = $collection->search($poll_id);

            if ($vars === false) {
                return false;
            } else {
                return true;
            }
        }

        public function ip_kontrol($ip_address, $option_id)
        {
            $select_option = Option::with('poll.options')->where('id', $option_id)->first();
            //dd($select_option->poll->options);
            foreach ($select_option->poll->options as $option) {
                $votes_kontrol = Vote::with('option.poll')
                    ->where(['ip' => $ip_address, 'option_id' => $option->id])->first();

                if ($votes_kontrol) {
                    session()->push('user_votes', $select_option->poll->id);
                    return false;
                }
            }
            $votes_kontrol = Vote::with('option.poll')->where(['ip' => $ip_address])->get();
            //dd($votes_kontrol);
            return true;
        }

    }
