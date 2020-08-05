<?php

use App\Convenience;
use App\Parameter;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::get('/pageAddHouse', function () {
    $parameters = Parameter::all()->sortBy('created_at');
    $conveniences = Convenience::all()->sortBy('created_at');



    return view('admin.addHouse',[
        'parameters' => ($parameters),
        'conveniences' => ($conveniences)
    ]);
})->name('pageAddHouse');

Route::get('/pageAddUpdateParameterOrConvenience', function () {
    $parameters = Parameter::all()->sortBy('created_at');
    $conveniences = Convenience::all()->sortBy('created_at');
    return view('admin.addUpdateParameterOrConvenience',[
        'parameters' => $parameters,
        'conveniences' => $conveniences
    ]);
})->name('pageAddUpdateParameterOrConvenience');

Route::post('/addHouse', 'HouseController@add')->name('addHouse');



Route::get('/','HouseController@getAll')->name('getAll');

Route::get('/getHouseNumber_{id}','HouseController@getThisHouse')->name('getThisHouse');


//Route::get('/getAllParameter', 'ParameterController@getAll')->name('parameterGetAll');
Route::post('/addParameter', 'ParameterController@add')->name('parameterAdd');
Route::post('/updateParameter', 'ParameterController@update')->name('parameterUpdate');
Route::post('/deleteParameter', 'ParameterController@delete')->name('parameterDelete');

//Route::get('/getAllConvenience', 'ConvenienceController@getAll')->name('convenienceGetAll');
Route::post('/addConvenience', 'ConvenienceController@add')->name('convenienceAdd');
Route::post('/updateConvenience', 'ConvenienceController@update')->name('convenienceUpdate');
Route::post('/deleteConvenience', 'ConvenienceController@delete')->name('convenienceDelete');
