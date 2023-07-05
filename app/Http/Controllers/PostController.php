<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ps = Post::all();

        return view('posts.post-index', compact('ps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.post-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $ps = new Post();
        $ps->title = $request->title;
        $ps->content = $request->content;
        $ps->publish_day = Carbon::now(); // Lưu ngày hiện tại
        $ps->author = Auth::user()->name; // Lưu tên người dùng đang đăng nhập
        $ps->user_id = Auth::id();
        $ps->save();

        return redirect()->route('posts.index');
        // $ps = Post::create([
        //     'title'=>$request->title,
        //     'content'=>$request->content,
        // ]);
        // $ps->save();
        // return redirect()->route('.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // $ps=Post::all();
        // return view('users.user-edit',['p'=>$post, 'ps'=>$ps]);
        return view('posts.post-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
    
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
