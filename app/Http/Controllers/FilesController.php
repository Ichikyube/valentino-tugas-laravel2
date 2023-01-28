<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Console\Input\Input;
use Cviebrock\EloquentSluggable\Services\SlugService;

class FilesController extends Controller
{
    public function create()
    {
        return view('posts.post');
    }

    function store(Request $request)
    {
        if($request->method() == "GET") return view('upload');

        $path = '';

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $imageName = time().'.' . $request->getClientOriginalName() . $request->image->extension();
        $file = $request->image->file("picture");
        $file->storeAs('img', $imageName);
        $path = $request->getHttpHost() . asset('storage/img'.$imageName);
        return back()->with('success', 'Image uploaded Successfully!')
        ->with('image',  ['img_path' => $path]);
    }

    public function storeImage(Request $request){
        $data= new Postimage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('images.view');
    }

    public function show($name)
    {
        $extension = File::extension($name);
        $path = public_path('storage/' . $name);
        if (!File::exists($path)) {abort(404);}
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;

        $file = Input::file('Picture');
        $imageName = $file->getClientOriginalName();

        $imgUpload = Image::make($file)->save(public_path('img/' . $imageName));
    }

    public function update(Request $request, $name)
    {
        $product = File::query()
        ->where("slug", $name)
        ->first();
        $product->fill($request->all());
        $product->save();
        return back();
    }

    public function destroy($id)
    {

        if (File::exists($id)) {
            File::delete($id);
        }
        return back();
    }
}
