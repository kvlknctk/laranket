<?php

    namespace App\Http\Controllers;

    use App\Poll;
    use App\State;
    use Illuminate\Http\Request;

    class PollCTRL extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $polls  = Poll::with('state')->get();

            //return $polls;

            $states = State::get();

            return view('poll.index', compact('polls', 'states'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            //
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            //return $request->all();
            Poll::create([
                'title'    => $request->get('title'),
                'state_id' => $request->get('state_id')
            ]);

            return redirect()->back()->with('message', 'Eklendi.');
        }

        /**
         * Display the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request $request
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            //
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Poll::destroy($id);

            return redirect()->back()->with('message', 'Silindi.');
        }
    }
