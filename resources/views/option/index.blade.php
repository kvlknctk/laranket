@extends('layouts.full')

@section('icerik')

    <div class="row">
        @forelse($polls as $item)

            <div class="col-md-3" style="border: 1px solid #c6c6c6; margin: 5px; padding: 5px;">
                {{$item->title}}
                <br>
                <strong>Bölge:</strong> {{$item->state->title}}
                <hr>
                <strong>Seçenekler</strong>
                    <ul>
                    @foreach($item->options as $option)
                        <li>{{$option->title}}</li>
                            <form action="{{route('secenek.destroy', ['id' => $option->id])}}" method="POST" >
                                <input type="hidden" name="_method" value="delete"/>
                                @csrf
                                {{--<input type="submit" placeholder="Sil" class="btn btn-danger" >--}}
                                <button class="btn btn-danger btn-sm" type="submit">
                                    sil
                                </button>
                            </form>
                            <hr>
                    @endforeach
                    </ul>
                {{--<a href="{{route('secenek.create', ['id' => $item->id])}}" class="btn btn-xs btn-success">Seçenek ekle</a>--}}
                <hr>
                <b>Yeni seçenek ekle:</b>
                <form action="{{route('secenek.store')}}" method="POST" enctype="multipart/form-data" style="padding: 10px; background-color: #e5ffbe; border: 1px solid #000;"  >
                    @csrf
                    <input type="hidden" name="poll_id" value="{{$item->id}}">
                    <input type="file" name="image" placeholder="resim seç" class="form-control-sm" required>
                    <input type="text" name="color" placeholder="Örnek : #FF00FF" class="form-control-sm" autocomplete="off" required>
                    <input type="text" name="title" placeholder="Seçenek ismi" class="form-control-sm" autocomplete="off" required>
                    <button class="btn btn-success btn-sm" type="submit">
                        ekle
                    </button>
                </form>
            </div>
        @empty
            Anket yok
        @endforelse
    </div>


  {{--  <hr>

    <form action="{{route('anket.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="bolge">Bölge seç</label>
            <select name="state_id" id="bolge" class="form-control">

                @foreach($states as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                @endforeach

            </select>
        </div>

        <div class="form-group">
            <label for="baslik">Anket başlığı</label>
            <input type="text" id="baslik" name="title" class="form-control" placeholder="Anket Başlığı">
        </div>

        <button type="submit" class="btn btn-success">Ekle</button>

    </form>
--}}



@endsection
