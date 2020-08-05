@extends('layouts.myapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div style="text-align: center">
                    <h1>Добавить квартиру</h1>
                </div>

                <form action="{{route('addHouse')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idAddress">Адрес (Страна, область, город, улица, дом)</label>
                        <input type="text" class="form-control" id="idAddress" name="address" placeholder="Страна, область, город, улица, дом" required>
                    </div>

                    <div class="form-group">
                        <label for="idDescription">Описание</label>
                        <textarea class="form-control" id="idDescription" cols="30" rows="10" name="description" required></textarea>
                    </div>


                        <label for="coordinates">Координаты (можно перемещать маркет на карте)</label>
                        <div class="input-group" id="coordinates">
                            <input type="text" class="form-control x_coordinate" id="x_coordinate" placeholder="Координаты x" name="x_coordinate">
                            <input type="text" class="form-control y_coordinate" id="y_coordinate" placeholder="Координаты y" name="y_coordinate">
                        </div>
                        <br>
                        <div id="map" style="width:100%; height:400px"></div>

{{--                    </div>--}}
                    <br>
                    <div id="app1">
                        <add-parameter-component :parameters="{{json_encode($parameters)}}" :conveniences="{{json_encode($conveniences)}}"></add-parameter-component>
                    </div>

                    <div class="form-group">
                        <label>Добавить фотографии</label> <br>
                        <input type="file" name="images[]" accept="image/jpeg,image/png,image/gif" required>
{{--                        <input type="button" class="deleteInputForNewImage" value="Удалить">--}}
                        <br>
                        <input type="button" class="addInputForNewImage" value="Добавить ещё картинку" style="margin-top: 10px;">
                    </div>



                    <div class="form-group">
                        <label for="idCountRoom">Количество комнат</label>
                        <input type="number" class="form-control" id="idCountRoom" name="count_room" required>
                    </div>

                    <div class="form-group">
                        <label for="idApartmentArea">Площадь квартиры</label>
                        <input type="number" class="form-control" id="idApartmentArea" name="apartment_area" required>
                    </div>

                    <div class="form-group">
                        <label for="idCost">Цена</label>
                        <input type="number" class="form-control" id="idCost" name="cost" required>
                    </div>
                    <div class="" style="text-align: center">
                        <button button type="submit" class="btn btn-outline-success">Добавить</button>
                    </div>
                </form>


            </div>
        </div>
        <script type="application/javascript">

             $(".addInputForNewImage").click(function () {
                 $("<input type='file' name='images[]' accept='image/jpeg,image/png,image/gif' required><input type='button' class='deleteInputForNewImage' value='Удалить'><br>").insertBefore(this);
             });

             $('body').delegate("input.deleteInputForNewImage", "click", function () {
                 $(this.previousSibling).remove();
                 $(this.nextSibling).remove();
                 this.remove();
             });

        </script>


        <script type="application/javascript">
            var map;
            var locationInfo = document.getElementById('location');

            DG.then(function () {
                map = DG.map('map', {
                    center: [54.98, 82.89],
                    zoom: 13,
                });
                DG.control.location({position: 'bottomright'}).addTo(map);
                DG.control.scale().addTo(map);
                DG.control.ruler({position: 'bottomleft'}).addTo(map);
                DG.control.traffic().addTo(map);

                map.locate({setView: true, watch: true})
                    .on('locationfound', function(e) {
                        DG.marker([e.latitude, e.longitude]).addTo(map);
                    })
                    .on('locationerror', function(e) {
                        DG.popup()
                            .setLatLng(map.getCenter())
                            .setContent('Доступ к определению местоположения отключён')
                            .openOn(map);
                    });
                marker =  DG.marker([54.981, 82.891], {
                    draggable: true
                }).addTo(map);

                marker.on('drag', function(e) {
                    var lat = e.target._latlng.lat.toFixed(3),
                        lng = e.target._latlng.lng.toFixed(3);

                    // locationInfo.innerHTML = lat + ', ' + lng;
                    document.getElementById('x_coordinate').value = e.target._latlng.lat.toFixed(5);
                    document.getElementById('y_coordinate').value = e.target._latlng.lng.toFixed(5);
                });


            });


            $(".x_coordinate").change(function () {
                map.setView([
                    document.getElementById('x_coordinate').value,
                    document.getElementById('y_coordinate').value
                ]);
                marker.setLatLng([
                    document.getElementById('x_coordinate').value,
                    document.getElementById('y_coordinate').value
                ]);
            });
            $(".y_coordinate").change(function () {
                map.setView([
                    document.getElementById('x_coordinate').value,
                    document.getElementById('y_coordinate').value
                ]);
                marker.setLatLng([
                    document.getElementById('x_coordinate').value,
                    document.getElementById('y_coordinate').value
                ]);
            });
        </script>

    </div>


@endsection
