<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TourEditorController extends Controller
{
    public function loadimage(Request $request)
    {
        if($request->hasFile('upload'))
        {
            $originName=$request->file('upload')->getClientOriginalName();
            $fileName=pathinfo($originName, PATHINFO_FILENAME);
            $extension=$request->file('upload')->getClientOriginalExtension();
            $fileName=$fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('image_tour'), $fileName);
            $url=asset('image_tour/' . $fileName);
            return response()->json(['fileName'=>$fileName, 'uploaded'=>1, 'url'=>$url]);
        }
    }
}
