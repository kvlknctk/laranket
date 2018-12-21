<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Inani\Larapoll\Poll;

    class AdminCTRL extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            return view('admin.dashboard');
        }

        public function yeni_anket()
        {

        }

        public function yeni_anket_post(Request $request)
        {
            return $request->all();
        }

    }
