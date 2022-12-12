<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    function landing(Request $request) {
        return view('blog.index')
            ->with('post', Post::orderBy('updated_at', 'DESC')->GET());
    }
    function about(Request $request) {
        return view('about');
    }
    function upload(Request $request) {
        // if($request->method() == "GET") {
        //     $publicFile = public_path("gambar\\6392a8ef735ed.png");
        //     unlink($publicFile);
        //     return view('upload');
        // }
        if($request->method() == "GET") return view('upload');
        $file = $request->file("gambar");
        //$file->move("gambar", uniqid() . "." . $file->getClientOriginalName());
        //$file->move("gambar", $file->hashName());
        $path = $request->getHost() . "/gambar/" . $file->hashName();
        return redirect()->back();
    }
}
