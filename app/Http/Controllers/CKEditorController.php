<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload'))
        {
            $originName=$request->file('upload')->getClientOriginalName();
            $fileName=pathinfo($originName, PATHINFO_FILENAME);
            $extension=$request->file('upload')->getClientOriginalExtension();
            $fileName=$fileName . '_' . time() . '.' . $extension;
            $request->file('upload')->move(public_path('save_img'), $fileName);
            $url=asset('save_img/' . $fileName);
            return response()->json(['fileName'=>$fileName, 'uploaded'=>1, 'url'=>$url]);
        }
    }
}
