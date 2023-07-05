<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cmt = Comment::all();
        return view('comments.comment-index',  compact('cmt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        //Dùng Query String để load dữ liệu qua lại 2 trang (tour-index và comment-create)
        $tourName = request()->input('tourName');
        $tourId = request()->input('tourId');
        return view('comments.comment-create', ['tourName' => $tourName, 'tourId' => $tourId]);
        // return view('comments.comment-create', ['tourName' => $tourName]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $cmt = new Comment();
        $cmt->title = $request->input('title');
        $cmt->rating = $request->input('rating');
        $cmt->comment = $request->input('comment');
        $cmt->comment_day = Carbon::now();
        $cmt->user_name = Auth::user()->name;
        $cmt->user_id = Auth::id();
        $cmt->tour_id = $request->input('tour_id');
        $cmt->save();
    
        return redirect()->route('comments.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comments.comment-edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        
        // $comment->title = $request->input('title');
        $comment->rating = $request->input('rating');
        $comment->comment = $request->input('comment');
        $comment->status = $request->input('status');

        $comment->save();

        return redirect()->route('comments.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
