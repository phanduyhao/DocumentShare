<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentMainController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->comment = $request->input('comment');
        $comment->parent_comment_id = $request->input('parent_comment_id');
        $comment->document_id = $request->input('document');
        // Set other fields if needed
        $comment->save();
        return response()->json($comment); // Return the new comment as JSON
    }

}