@extends('layouts.full')

@section('icerik')



    @foreach($adversites as $item)
        {{$item->title}}
        <div class="col-md-8">
            <img src="{{asset('yukleme/'.$item->image)}}" class="img-fluid" alt="">

        </div>
        <div class="col-md-2">

            <form action="{{route('reklam.destroy', ['id' => $item->id])}}" method="POST" >
                <input type="hidden" name="_method" value="delete"/>
                @csrf
                <button class="btn btn-danger btn-sm" type="submit">sil</button>
            </form>
        </div>

        <hr>
    @endforeach

    <hr>
    {{--yükleme alanı--}}
    <h3>Not: Genişlik : 360px / Yükseklik : 100px</h3>
    <form action="{{route('reklam.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Başlık" class="form-control col-md-6" required>
        <input type="file" name="reklam" class="form-control col-md-6">
        <button type="submit" class="btn btn-success">Yükle</button>
    </form>


@endsection