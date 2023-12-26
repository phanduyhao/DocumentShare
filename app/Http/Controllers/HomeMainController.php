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

        $settings = Setting::where('id',1)->first();
        $number_docs = $settings->docs_home;
        $doc_hots = Document::where('score', '>', 0)
            ->where('status',1)
            ->orderBy('score', 'desc')  // Sắp xếp theo điểm giảm dần, ví dụ
            ->take($number_docs)
            ->get();
        $doc_hot2s = Document::where('score', '>', 0)
            ->where('status',1)
            ->orderBy('id', 'desc')  // Sắp xếp theo điểm giảm dần, ví dụ
            ->take($number_docs)
            ->get();
        $doc_news = Document::where('status',1)
            ->orderBy('id', 'desc')
            ->take($number_docs)
            ->get();
        $doc_new2s = Document::where('status',1)
            ->orderBy('rate', 'desc')
            ->take($number_docs)
            ->get();
        return view('welcome',compact('slides','slide1','slide2','slide3','doc_hots','doc_hot2s','doc_news','doc_new2s','number_docs'),[
            'title' => 'Trang chủ'
        ]);
    }
}
