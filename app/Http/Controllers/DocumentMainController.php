<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Favourite;
use App\Models\Rate;
use App\Models\status;
use App\Models\Tag;
use App\Models\View;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentMainController extends Controller
{
    public function Index($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();
        $documents = Document::withCount(['views', 'downloads'])->where('cate_id', $category->id)->paginate(6);
        $favourites = Favourite::where('user_id',Auth::id())->get();
        return view('document.index', compact('category', 'documents','favourites'), [
            'title' => 'Tài liệu ' . $category->title,
        ]);

    }


//    Chi tiết tài liệu
    public function details($slug)
    {
        $document = Document::withCount(['comments','views', 'downloads'])->where('slug', $slug)->first();
        $document_id = $document->id;
        $rate_tb = Rate::where('document_id',$document_id)->get();
        if($document){
            $initialCommentsCount = 10; // Số lượng ban đầu hiển thị
            $loadMoreCommentsCount = 5;
            $comments = Comment::where('document_id', $document_id)->take($initialCommentsCount)->get();

            // Tìm tài liệu dựa trên trường 'slug'
            $cate = Category::find($document->cate_id);
            if($document->cate_id) {
                $cate_title = $cate->title;
            } else {
                $cate_title = "Chưa có danh mục !";
            }
            $user = User::find($document->user_id);
            $username = $user->name;
            $tag = Tag::find($document->tag_id);
            if($document->tag_id) {
                $tag_name = $tag->tag_name;
            } else {
                $tag_name = "Chưa có thẻ tag !";
            }
            $filename = $document->file;

            return view('document.details', compact('filename','document','username','cate_title','tag_name','comments','rate_tb','initialCommentsCount','loadMoreCommentsCount'),[
                'title' => $filename
            ]);
        }
    }
}
