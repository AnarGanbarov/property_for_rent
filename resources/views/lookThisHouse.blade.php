@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-2">
            <h3>Параметры</h3>
            <h3>Удобства</h3>
        </div>

        <div class="col-md-8" style="height: 400px; outline: 1px solid #c1c1c1;">

            {{-- Если пользователь авторизован, то у фоток снизу есть кнопки "<" и ">". --}}

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($house['images'] as $image)
                        @if($image['list_number'] == 1)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$image['list_number']-1 }}" class="active"></li>
                        @else
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$image['list_number']-1 }}"></li>
                        @endif
                    @endforeach
                </ol>
                <div class="carousel-inner" style="height: 400px">
                    @foreach($house['images'] as $image)
                        @if($image['list_number'] == 1)
                            <div class="carousel-item active" style="vertical-align: middle; height: 400px; position: relative;">
                                <img class="d-block w-100" src="/storage/{{$image['url_photo']}}" alt="First slide" style="max-height: 100%;  max-width: 100%;  position: absolute;  top: 0;  bottom: 0;  left: 0;  right: 0;  margin: auto;">
                            </div>
                        @else
                            <div class="carousel-item" style="height: 400px; position: relative;">
                                <img class="d-block w-100" src="/storage/{{$image['url_photo']}}" alt="First slide" style="max-height: 100%;  max-width: 100%;  position: absolute;  top: 0;  bottom: 0;  left: 0;  right: 0;  margin: auto;">
                            </div>
                        @endif
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-2">
            <h3>Описание</h3>
        </div>

    </div>

</div>

<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
<script type="text/javascript">
    var map;

    DG.then(function () {
        map = DG.map('map', {
            center: [54.98, 82.89],
            zoom: 13
        });

        DG.marker([54.98, 82.89]).addTo(map).bindPopup('Вы кликнули по мне!');
    });
</script>

<div id="map" style="width:100%; height:600px; margin-top: 40px;"></div>
@endsection
