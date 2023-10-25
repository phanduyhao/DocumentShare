<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::paginate(10);
        return view('admin.comment.index',compact('comments'),[
            'title'=>'Quản lý bình luận'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        // Chuyển hướng về trang danh sách cate hoặc trang khác (tuỳ ý)
        return response()->json(['message' => 'Bình luận đã được xóa thành công']);
    }
}
