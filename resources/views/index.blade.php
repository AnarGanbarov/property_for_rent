@extends('layouts.myapp')

@section('content')
    {{--  Да простят меня за такое.  --}}
    <link href="{{ asset('/css/my.css') }}" rel="stylesheet">

    <div class="container">
        <div class="row">
            <div class="">
{{--
        Тут все объявления. Если пользователь авторизован, то вверху появляется кнопка "Добавить объявление"
        и у  каждого объявления есть кнопки "Удалить" и "Рекдатировать".
--}}
                @foreach($allHouses as $oneHouse)
                    <a href="{{route('getThisHouse', $oneHouse['id'])}}">
                        <div style="height: 250px;width: 272px; display: inline-block; outline: 1px solid #c1c1c1; margin: 10px;">
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

                            <div style="height: 20px; width: 100%; text-align: right; margin-bottom: 10px; padding-right: 10px;">
                                {{$oneHouse['count_room']. ' комн, '. $oneHouse['apartment_area'].'м", '. $oneHouse['cost'].' руб / мес.'}}
                                @if($oneHouse["rent"])
                                    <form action="{{route('setHouseAsRent', $oneHouse['id'])}}" style="display: inline-block" method="post">
                                        @csrf
                                        <input type="submit" value="Сдан">
                                    </form>
                                @endif

                            </div>
                        </div>

                    </a>


                @endforeach

            </div>
        </div>
    </div>
@endsection
