@extends('front.index')

@section('anket')
    <div class="card mb-4 shadow-sm">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Iğdır / {{$masterPoll->state->title}}
                <br>

                {{--@if($switch) <br> Oy kullandınız @endif--}}
            </h4>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">

                    @foreach($masterPoll->options as $item)
                        <div class="secenek">
                            <divm class="sec_foto">
                                <img src="{{asset($item->image)}}" alt="">
                            </divm>
                            <div class="sec_bar">
                                <div class="sec_name">
                                    {{$item->title}}



                                    @if($switch)
                                        <div style="font-size: 15px;"><b>Toplam Oy</b> : {{$item->votes_count}} /
                                            % {{ round(@($item->votes_count / $sum) * 100) }}</div>
                                    @else
                                        <br>
                                        <br>
                                    @endif


                                </div>

                                <div class="clearfix"></div>

                                @if($switch)
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                             role="progressbar"
                                             aria-valuenow="75"
                                             aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: {{ @($item->votes_count / $sum) * 100 }}%"></div>
                                    </div>
                                @else
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                             role="progressbar"
                                             aria-valuenow="75"
                                             aria-valuemin="0"
                                             aria-valuemax="100"
                                             style="width: 0%"></div>
                                    </div>
                                @endif

                            </div>
                            <div class="sec_select float-right ">
                                @if(!$switch)
                                    <a href="{{route('oy_ver', ['id' => $item->id])}}"
                                       class="btn btn-sm btn-block btn-primary ">OYLA!</a>
                                @endif
                            </div>
                        </div>
                    @endforeach


                </div>


            </div>


        </div>
    </div>
@endsection