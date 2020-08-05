@extends('layouts.myapp')

@section('content')
    {{--  Да простят меня за такое.  --}}
    <link href="{{ asset('/css/my.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
{{--
        Тут все объявления. Если пользователь авторизован, то вверху появляется кнопка "Добавить объявление"
        и у  каждого объявления есть кнопки "Удалить" и "Рекдатировать".
--}}
                @foreach($allHouses as $oneHouse)
                <div style="height: 240px;width: 272px; display: inline-block; outline: 1px solid #c1c1c1">
                    <div id="carouselExampleIndicators{{$oneHouse['id']}}" class="carousel slide" data-ride="carousel"
                         style="width: 270px; height: 220px; vertical-align: middle; overflow: hidden">
                        <ol class="carousel-indicators">
                            @foreach($oneHouse['images'] as $image)
                                @if($image['list_number'] == 1)
                                    <li data-target="#carouselExampleIndicators{{$oneHouse['id']}}" data-slide-to="{{$image['list_number']-1 }}" class="active"></li>
                                @else
                                    <li data-target="#carouselExampleIndicators{{$oneHouse['id']}}" data-slide-to="{{$image['list_number']-1 }}"></li>
                                @endif
                            @endforeach
                        </ol>

                        <div class="carousel-inner" >
                            @foreach($oneHouse['images'] as $image)
                                @if($image['list_number'] == 1)
                                    <div class="carousel-item active frame" style="vertical-align: middle;">
                                        <img class="d-block w-100 myimg" src="/storage/{{$image['url_photo']}}" alt="First slide">
                                    </div>
                                @else
                                    <div class="carousel-item frame">
                                        <img class="d-block w-100 myimg" src="/storage/{{$image['url_photo']}}" alt="First slide">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators{{$oneHouse['id']}}" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators{{$oneHouse['id']}}" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div style="height: 20px; width: 100%;">
                        {{$oneHouse['count_room']. ' комнат, '. $oneHouse['apartment_area'].'м", '. $oneHouse['cost'].' руб / мес.'}}
                    </div>
                </div>

                @endforeach

            </div>
        </div>
    </div>
@endsection
