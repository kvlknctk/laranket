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
                        <li>{{$option->title}} - <b> {{$option->votes_count}} Oy</b> </li>
                        <form action="{{route('hack.store')}}" method="POST" >

                            @csrf
                            <input type="number" name="piece" value="1">
                            <input type="hidden" name="option_id" value="{{$option->id}}">
                            <button class="btn btn-info btn-sm" type="submit">
                                çoğalt
                            </button>
                        </form>
                    @endforeach
                </ul>
                {{--<a href="{{route('secenek.create', ['id' => $item->id])}}" class="btn btn-xs btn-success">Seçenek ekle</a>--}}

            </div>
        @empty
            Anket yok
        @endforelse
    </div>




@endsection
