<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests\ProductStoreRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view ('products.index')
        ->with('products', $products);//show all member of Product and orderBy('created_at', 'DESC')
    }

    public function create() {
        return view("products.create");
    }

    public function store(ProductStoreRequest $request) {

        $validated = $request->validated();
        // trim title and convert it to title case
        $validated['name'] = Str::of($validated['title'])->trim()->title();

        $content = File::create([]);
        $validated['mediaFiles_id'] = $content->id;
        Product::create($validated);

        return redirect('/brands')
            ->with('message', 'Your product has been added!');
    }

    //menampilkan sebuah data
    public function show($slug) {
        $page = Product::whereSlug($slug)->get();
        if(is_null($page)){
            App::abort(404);
        }
        return view("products.show", $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductStoreRequest $request, $id)
    {
        try {
            $product = Product::where("id", $id)
                    ->firstOrFail();
            $validated = $request->validated();
            // trim title and convert it to title case
            $validated['name'] = Str::of($validated['title'])->trim()->title();

            $product->update($validated);
        } catch (\Exception $e) {
            return view("failed to update");
        }

        return back()->with('message', 'Your product is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::query()
        ->where("id", $id);
        $mediaFiles= File::query()->where("id", $product->mediaFiles_id);
        $mediaFiles->delete();
        $product->delete();

        return back();
    }
}
