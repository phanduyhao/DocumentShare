<?php

namespace App\Http\Controllers;

use App\Models\DocInteraction;
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
        $user_name = $comment->user->name;
        $comment->save();
        // $interaction = new DocInteraction();
        // $interaction->user_id = Auth::id();
        // $interaction->document_id = $request->input('document');
        // $interaction->action = 'comment'; // Ghi lại hành động là "yêu thích"
        // $interaction->comment_id = $comment->id;
        // $interaction->save();
        return response()->json(['comment' => $comment->comment, 'user_name' => $user_name]); // Return the new comment and user_name as JSON
    }

}
