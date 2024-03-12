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
        function getDocuments($status, $orderBy, $numberDocs) {
            return Document::where('status', $status)
                ->orderBy($orderBy, 'desc')
                ->take($numberDocs)
                ->get();
        }

        $doc_hots = getDocuments(1, 'score', $number_docs);
        $doc_hot2s = getDocuments(1, 'id', $number_docs);
        $doc_news = getDocuments(1, 'id', $number_docs);
        $doc_new2s = getDocuments(1, 'rate', $number_docs);
        return view('welcome',compact('slides','slide1','slide2','slide3','doc_hots','doc_hot2s','doc_news','doc_new2s','number_docs'),[
            'title' => 'Trang chủ'
        ]);
    }
}
