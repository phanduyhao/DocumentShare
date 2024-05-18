<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Download;
use App\Models\File;
use App\Models\Payment_History;
use App\Models\Rate;
use App\Models\User;

class HomeController extends Controller
{
    public function home(){
        $users_count = User::count();
        $docs_count = Document::count();
        $cates_count = Category::count();
        $files_count = File::count();
        $comments = Comment::count();
        $downloads = Download::count();
        $view_count = Document::sum('views');
        $rates = Rate::count();
        $payments = Payment_History::count();
        return view ('admin.home',compact('users_count','docs_count', 'cates_count','files_count','comments','downloads','rates','view_count','payments'),[
            'title' => 'Trang quản trị'
        ]);
    }
}
