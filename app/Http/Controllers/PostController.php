<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $path = $request->photo->store('public/images');

        Post::create([
            'image' => Storage::url($path),
            'description' => $request->description,
            'user_id' => $user->id,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $user = auth()->user();

        $post = Post::find($id);

        if ($post->user_id != $user->id) {
            abort(404);
        }

        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post = Post::find($id);
        $user = auth()->user();

        // Valida se o post pertence ao usuário logado
        if ($post->user_id != $user->id) {
            abort(404);
        }

        // Valida se a descrição está vazia
        if (empty($request->description)) {
            return back();
        }

        $post->update([
            'description' => $request->description
        ]);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::find($id);
        $user = auth()->user();

        // Valida se o post pertence ao usuário logado
        if ($post->user_id != $user->id) {
            abort(404);
        }

        $post->delete();

        return redirect('/');
    }
}
