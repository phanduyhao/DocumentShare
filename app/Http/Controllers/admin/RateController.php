<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rates = Rate::paginate(20);
//        Tính trung bình điểm đánh giá theo mỗi Document
        $averageRates = DB::table('rates')
            ->select('document_id', DB::raw('AVG(rates) as average_rate'))
            ->groupBy('document_id')
            ->get();

        return view('admin.rate.index',compact('rates','averageRates'),[
            'title' => 'Quản lý đánh giá'
        ]);
    }

}
