@extends('layouts.full')

@section('icerik')

       <div class="row">
           @forelse($states as $item)

               <div class="col-md-3" style="border: 1px solid #c6c6c6; margin: 5px; padding: 5px;">
                   {{$item->title}}
                   <form action="{{route('bolge.destroy', ['id' => $item->id])}}" method="POST" >
                       <input type="hidden" name="_method" value="delete"/>
                       @csrf
                       {{--<input type="submit" placeholder="Sil" class="btn btn-danger" >--}}
                       <button class="btn btn-danger btn-xs" type="submit">
                           sil
                       </button>
                   </form>
               </div>
           @empty
               İçerik yok
           @endforelse
       </div>


    <hr>

    <form action="{{route('bolge.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="baslik"></label>
            <input type="text" id="baslik" name="title" class="form-control" placeholder="Bölge Adı" autofocus>
        </div>

        <button type="submit" class="btn btn-success">Ekle</button>

    </form>




@endsection
