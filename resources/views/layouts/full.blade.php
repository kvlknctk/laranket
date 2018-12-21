@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <ul>
                    <li><a href="{{route('bolge.index')}}">Bölgeler</a></li>
                    <li><a href="{{route('anket.index')}}">Anketler</a></li>
                    <li><a href="{{route('secenek.index')}}">Seçenekler</a></li>
                    <li><a href="{{route('hack.index')}}">Hack</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                @yield('icerik')
            </div>
        </div>
    </div>
@endsection
