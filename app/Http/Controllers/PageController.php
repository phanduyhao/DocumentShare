<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact(){
        return view('page.contact',[
            'title' => 'Trang liên hệ'
        ]);
    }

    public function about(){
        return view('page.about',[
            'title' => 'Trang giới thiệu'
        ]);
    }
}
