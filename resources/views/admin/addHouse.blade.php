@extends('layouts.myapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Добавить квартиру</h1>
                <form action="{{route('addHouse')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="idAddress">Адрес</label>
                        <input type="text" class="form-control" id="idAddress" name="address" value="a">
                        <small id="addressHelp" class="form-text text-muted">
                            При изменении адреса (при его написании) подгружается карта 2GIS.
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="idDescription">Описание</label>
                        <textarea class="form-control" id="idDescription" cols="30" rows="10" name="description">a</textarea>
                    </div>

                    <div class="form-group">
                        <label>Добавить фотографии</label> <br>
                        <input type="file" name="images[]" accept="image/jpeg,image/png,image/gif"><input type="button" class="deleteInputForNewImage" value="Удалить">
                        <br>
                        <input type="button" class="addInputForNewImage" value="Добавить ещё картинку" style="margin-top: 10px;">
                    </div>



                    <div class="form-group">
                        <label for="idCountRoom">Количество комнат</label>
                        <input type="number" class="form-control" id="idCountRoom" name="count_room" value="1">
                    </div>

                    <div class="form-group">
                        <label for="idApartmentArea">Площадь квартиры</label>
                        <input type="number" class="form-control" id="idApartmentArea" name="apartment_area" value="1">
                    </div>

                    <div class="form-group">
                        <label for="idXCoordinate">X координаты</label>
                        <input type="number" class="form-control" id="idXCoordinate" name="x_coordinate" value="1.1">
                    </div>

                    <div class="form-group">
                        <label for="idYCoordinate">Y координаты</label>
                        <input type="number" class="form-control" id="idYCoordinate" name="y_coordinate" value="1.1">
                    </div>

                    <div class="form-group">
                        <label for="idCost">Цена</label>
                        <input type="number" class="form-control" id="idCost" name="cost" value="1">
                    </div>
                    <div class="" style="text-align: center">
                        <button button type="submit" class="btn btn-outline-success">Добавить</button>
                    </div>
                </form>


            </div>
        </div>
        <script type="application/javascript">

             $(".addInputForNewImage").click(function () {
                 $("<input type='file' name='images[]' accept='image/jpeg,image/png,image/gif'><input type='button' class='deleteInputForNewImage' value='Удалить'><br>").insertBefore(this);
             });

             $('body').delegate("input.deleteInputForNewImage", "click", function () {
                 $(this.previousSibling).remove();
                 $(this.nextSibling).remove();
                 this.remove();
             });
        </script>
    </div>


@endsection
