<?php

namespace App\Http\Controllers;

use App\House;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HouseController extends Controller
{
    public function getAll(Request $request)
    {
        $allHouses = House::all()->sortBy("create_at");

        return view('index', [
            'allHouses' => $allHouses
        ]);
    }

    public function getThisHouse(Request $request)
    {
        $thisHouses = House::all()
            ->where('id', $request->id);

        return view('index', [
            '$thisHouses' => $thisHouses
        ]);
    }


    public function add(Request $request)
    {
        /*
        $path = $request->file('url_image')->storePubliclyAs('project_pictures','img_'.$projectId.'.jpg','public');
        $projectUpdateUlrImage = Project::find($projectId);
        $projectUpdateUlrImage->url_image = '/project_pictures/img_'.$projectId.'.jpg';
        $projectUpdateUlrImage->save();
        */
        $house = Auth::user()->houses()->create([
            'address' => $request->address,
            'description' => $request->description,
            'count_room' => $request->count_room,
            'apartment_area' => $request->apartment_area,
            'x_coordinate' => $request->x_coordinate,
            'y_coordinate' => $request->y_coordinate,
            'cost' => $request->cost
        ]);

        $houseId = $house->id;

        for ($i = 0; $i < count($request["images"]); $i++)
        {
            $path = $request->file('images')[$i]->store('images','public');

            $house->photos()->create([
                'url_photo' => $path,
                'list_number' => $i + 1
            ]);
        }

        return redirect("/");
    }

    public function change(Request $request)
    {
        return view('home');
    }

    public function buy(Request $request)
    {
        return view('home');
    }

    public function delete(Request $request)
    {
        return view('home');
    }

}
