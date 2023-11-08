<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $views = View::groupBy(['user_id', 'document_id'])
            ->select('user_id', 'document_id', \DB::raw('count(*) as view_count'))
            ->paginate(20);

        return view('admin.view.index', compact('views'), [
            'title' => 'Quản lý lượt xem'
        ]);
    }
}
