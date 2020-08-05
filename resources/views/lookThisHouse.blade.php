@extends('layouts.myapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <input type="text" hidden id="x_coordinate" value="{{$house['x_coordinate']}}">
        <input type="text" hidden id="y_coordinate" value="{{$house['y_coordinate']}}">

        <div class="col-md-2">
            <h3>Параметры</h3>
            @foreach($house['parameters'] as $parameter)
                <span class="badge badge-pill badge-info" style="padding: 10px; color: white; font-size: 12px; margin: 5px;">{{$parameter['name']}}</span>
            @endforeach

            <h3>Удобства</h3>
            @foreach($house['conveniences'] as $convenience)
                <span class="badge badge-pill badge-success" style="padding: 10px; color: white; font-size: 12px; margin: 5px;">{{$convenience['name']}}</span>
            @endforeach
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
            <p>
                {{$house['description']}}
            </p>
        </div>

    </div>

</div>


<script type="application/javascript">
    var map;
    var x = document.getElementById('x_coordinate').value;
    var y = document.getElementById('y_coordinate').value;
    var was_null = false;
    if( !(x && y))
    {
        x =  55.751727;
        y =  37.621543;
        was_null = true;
    }
    DG.then(function () {
        map = DG.map('map', {
            center: [x, y],
            zoom: 13
        });
        if( !was_null )
        {
            DG.marker([x, y]).addTo(map).bindPopup('Вы кликнули по мне w!');
        }

    });
</script>

<div id="map" style="width:100%; height:600px; margin-top: 40px;"></div>
@endsection
