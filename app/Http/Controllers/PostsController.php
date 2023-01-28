<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('posts.index')
        ->with('posts', Post::latest()->get());//show all member of Post and orderBy('created_at', 'DESC')
    }

    public function create() {
        return view("posts.create");
    }

    public function store(PostStoreRequest $request) {

        $validated = $request->validated();
        // trim title and convert it to title case
        $validated['title'] = Str::of($validated['title'])->trim()->title();
        // make excerpt from post body
        if(is_null($validated['excerpt'])) $validated['excerpt'] = Str::limit(strip_tags($validated['body']), 150);

        if ($validated['image']) {
            $image = $request->file('image');
            $imageName = time().'.'. $image->getClientOriginalName().$image->getClientOriginalExtension();
            $validated['image'] = $image->storeAs(public_path('img'), $imageName);
            $validated['has_image'] = true;

        } else $imageName = "default.jpg";

        $content = Article::create([
            'post-trixFields' => request('post-trixFields'),
            'attachment-post-trixFields' => request('attachment-post-trixFields')
        ]);
        $validated['article_id'] = $content->id;
        Post::create($validated);

        return redirect('/blogs')
            ->with('message', 'Your post has been added!');
    }

    //menampilkan sebuah data
    public function show($slug) {
        $page = Post::whereSlug($slug)->get();
        if(is_null($page)){
            App::abort(404);
        }
        return view("posts.show", $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $post = Post::where("id", $id)
                    ->firstOrFail();

            $validated = $request->validate([
                'title'     => 'required|max:255',
                'body'      => 'required',
                'image'     => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
                'name'      => 'required',
                'excerpt'   => 'nullable'
            ]);

            // trim title and convert it to title case
            $validated['title'] = Str::of($validated['title'])->trim()->title();
            // make excerpt from post body
            if(is_null($validated['excerpt'])) $validated['excerpt'] = Str::limit(strip_tags($validated['body']), 150);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $storage = Storage::disk('public');

                if($storage->exists($post->image))
                    $storage->delete($post->image);
                else $validated['has_image'] = true;
                $imageName = time().'.'. $image->getClientOriginalName().$image->getClientOriginalExtension();
                $validated['image'] = $image->storeAs(public_path('img'), $imageName);
            }

            $post->update($validated);
        } catch (\Exception $e) {
            return view("failed to update");
        }

        return back()->with('message', 'Your post is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $post = Post::query()
        ->where("id", $id);
        $article = Article::query()->where('id', $post->article_id);
        $article->delete();
        $post->delete();
        return back();
    }

}
