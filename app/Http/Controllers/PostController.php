<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index() {
        return view("blog.list")
        ->with('post', Post::orderBy('updated_at', 'DESC')->get());
    } //menampilkan seluruh data

    public function detail($id) {
        $product = Product::query()
            ->where("id", $id)
            ->first();
        return view("products.detail", $product);
    } //menampilkan sebuah data

    public function store() {
        return view("products.store");
    }

    public function create(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'name'     => 'required',
            'price'     => 'required|integer'
        ]);
        //$file = $request->file("gambar");
        //$file->move("gambar", uniqid() . "." . $file->getClientOriginalName());
        //$file->move("gambar", $file->hashName());
        //$path = $request->getHost() . "/gambar/" . $file->hashName();


        $imageName = time().'.'.$request->image->extension();
        // Public Folder
        $request->image->move(public_path('images'), $imageName);
        //$request->image->storeAs('images', $imageName);
        //$image = $request->file('image');
        //$image->storeAs('public/images', $image->hashName());
        $payload = [
            "name"          =>  $request->input("name"),
            "category"      =>  $request->input("category"),
            "description"   =>  $request->input("description"),
            "price"         =>  $request->input("price"),
            'media_file'     => $imageName,
            //"dateofproduction"      =>  $request->input("dateofproduction"),
        ];
        $request->get("name");
        $request->all();
        $request->post("name");
        $request->acceptsJson();
        $request->allFiles();
        $request->bearerToken();
        $request->getMethod();
        $request->session();
        session();
        $request->url();
        $request->header("Authoriation");
        Product::query()->create($payload);
        return redirect()->back();
    }

    public function update(Request $request, $id) {
        $product = Product::query()
        ->where("id", $id)
        ->first();
        $product->fill($request->all());
        $product->save();
        return redirect()->back();
    }

    public function destroy($id) {
        $product = Product::query()
        ->where("id", $id)
        ->delete();
        return redirect()->back();
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
    public function upview()
    {
        return view('products.product');
    }

    // Store Image
    public function storeImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $imageName = time().'.'.$request->image->extension();

        // Public Folder
        $request->image->move(public_path('images'), $imageName);
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        //dd($slug);

        // //Store in Storage Folder
        // $request->image->storeAs('images', $imageName);

        // // Store in S3
        // $request->image->storeAs('images', $imageName, 's3');

        //Store IMage in DB


        return back()->with('success', 'Image uploaded Successfully!')
        ->with('image', $imageName);
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
    }

    // $path = '';

    // if ($request->hasFile('Picture')) {
    //     $file = $request->file('Picture');
    //     $path = $file->storeAs(public_path('img'), $imageName);

    //     //or
    //     if (file_put_contents(public_path(img) . $imageName, $file)) {
    //         $path = public_path(img) . $imageName;
    //     }
    // }

    // return view('your-view', ['img_path' => $path]);;

}
