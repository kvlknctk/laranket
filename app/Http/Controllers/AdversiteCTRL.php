<?php

    namespace App\Http\Controllers;

    use App\Adversite;
    use Illuminate\Http\Request;

    class AdversiteCTRL extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $adversites = Adversite::get();


            return view('adversite.adversite', compact('adversites'));
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
            $photoName = time() . '.' . $request->reklam->getClientOriginalExtension();


            $request->reklam->move(public_path('yukleme'), $photoName);

            Adversite::create([
                'title' => $request->get('title'),
                'image' => $photoName
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
            Adversite::destroy($id);
            return redirect()->back()->with('message', 'Başarıyla silindi.');
        }
    }
