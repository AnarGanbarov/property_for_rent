@extends('layouts.myapp')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div style="text-align: center">
                    <h3>Пармаетры</h3>
                </div>

                <form action="{{route('parameterAdd')}}" method="post">
                    @csrf
                    <input type="text" class="form-control" name="name">
                    <input type="submit" value="Создать">
                </form>

                <table>
                    <tr>
                        <th>Название</th>
                        <th>Удалить</th>
                        <th>Изменить на</th>
                    </tr>

                    @foreach($parameters as $parameter )
                        <tr>
                            <td>{{$parameter->name}}</td>
                            <td>
                                <form action="{{route('parameterDelete')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$parameter->id}}" name="id">
                                    <button id="delete" >Удалить</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('parameterUpdate')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$parameter->id}}" name="id">
                                    <input type="text" name="name">
                                    <input type="submit" value="Редактировать">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="col">
                <div style="text-align: center">
                    <h3>Удобства</h3>
                </div>
                <form action="{{route('convenienceAdd')}}" method="post">
                    @csrf
                        <input type="text" class="form-control" name="name">
                        <input type="submit" value="Создать">
                </form>

                <table>
                    <tr>
                        <th>Название</th>
                        <th>Удалить</th>
                        <th>Изменить на</th>
                    </tr>
                    @foreach($conveniences as $convenience)
                        <tr>
                            <td>{{$convenience->name}}</td>
                            <td>
                                <form action="{{route('convenienceDelete')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$convenience->id}}" name="id">
                                    <button id="delete" >Удалить</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('convenienceUpdate')}}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{$convenience->id}}" name="id">
                                    <input type="text" name="name">
                                    <input type="submit" value="Редактировать">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection
