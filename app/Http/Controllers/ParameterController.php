<?php

namespace App\Http\Controllers;

use App\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    public function getAll(Request $request)
    {}

    public function add(Request $request)
    {
        $new = new Parameter();
        $new->name = $request->name;
        $new->save();
        return redirect(url()->previous());
    }

    public function update(Request $request)
    {
        Parameter::find($request->id)->update(['name' => $request->name]);
        return redirect(url()->previous());
    }

    public function delete(Request $request)
    {
        Parameter::destroy($request->id);
        return redirect(url()->previous());
    }
}
