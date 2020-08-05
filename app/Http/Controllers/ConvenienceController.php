<?php

namespace App\Http\Controllers;

use App\Convenience;
use Illuminate\Http\Request;

class ConvenienceController extends Controller
{
    public function getAll(Request $request)
    {}

    public function add(Request $request)
    {
        $new = new Convenience();
        $new->name = $request->name;
        $new->save();
        return redirect(url()->previous());
    }

    public function update(Request $request)
    {
        Convenience::find($request->id)->update(['name' => $request->name]);
        return redirect(url()->previous());
    }

    public function delete(Request $request)
    {
        Convenience::destroy($request->id);
        return redirect(url()->previous());
    }
}
