<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Setting;
use App\Models\Slide;
use Illuminate\Http\Request;

class HomeMainController extends Controller
{
    public function welcome(){
        $slides = Slide::where('active',1)->get();
        $slide1 = Slide::where('id',1)->first();
        $slide2 = Slide::where('id',2)->first();
        $slide3 = Slide::where('id',3)->first();

        $number_docs = Setting::where('id',1)->first();

        $doc_hots = Document::where('score', '>', 0)
            ->where('status',1)
            ->orderBy('score', 'desc')  // Sắp xếp theo điểm giảm dần, ví dụ
            ->take($number_docs->docs_home)
            ->get();

        return view('welcome',compact('slides','slide1','slide2','slide3','doc_hots'),[
            'title' => 'Trang chủ'
        ]);
    }
}
