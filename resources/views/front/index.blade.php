@extends('front.master')
@inject('indexData','App\Services\IndexService')

@php
    $allData = $indexData->pollsData();
@endphp

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="anabaslik">31 Mart 2019 Türkiye Yerel Seçimleri</h1>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">



            @yield('anket')

            <div class="col-md-12">

                <select name="" id="" class="form-control"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                    <option value="">Diğer anketler</option>
                    @foreach($allData as $item)
                        <option value="{{route('anket', ['id' => $item->id])}}">{{$item->title}}</option>
                    @endforeach

                </select>
            </div>

        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">

                <div class="col-12 text-center">
                    <a href="{{route('iletisim')}}">
                        <h5>İletişim</h5>
                    </a>
                    <ul class="list-unstyled text-small">
                        {{--<li><a class="text-muted" href="#">Cool stuff</a></li>--}}
                    </ul>
                </div>

                <div class="col-12 text-center">
                    {{--<img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">--}}
                    <small class="d-block mb-3 text-muted">&copy; 2017-2018, Tüm hakları saklıdır.
                        Powered by <a href="https://eruzay.com.tr" target="_blank">Eruzay Yazılım</a>
                    </small>
                </div>


            </div>
        </footer>
    </div>
@endsection


