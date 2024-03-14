<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Favourite;
use App\Models\Setting;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeMainController extends Controller
{
    public function welcome(){
        $slides = Slide::where('active',1)->get();
        $slide1 = Slide::where('id',1)->first();
        $slide2 = Slide::where('id',2)->first();
        $slide3 = Slide::where('id',3)->first();
        function getDocuments($status, $orderBy) {
            $settings = Setting::where('id',1)->first();
            $number_docs = $settings->docs_home;
            return Document::withCount('downloads')->where('status', $status)
                ->orderBy($orderBy, 'desc')
                ->take($number_docs)
                ->get();
        }
        $doc_hots = getDocuments(1, 'score');
        $doc_hot2s = getDocuments(1, 'id');
        $doc_news = getDocuments(1, 'id');
        $doc_new2s = getDocuments(1, 'rate');
        $favourites = Favourite::where('user_id',Auth::id())->get();
        return view('welcome',compact('slides','slide1','slide2','slide3','doc_hots','doc_hot2s','doc_news','doc_new2s','favourites'),[
            'title' => 'Trang chủ'
        ]);
    }
}
