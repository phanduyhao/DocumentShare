<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Download;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $downloads = Download::groupBy(['user_id', 'document_id'])
            ->select('user_id', 'document_id', \DB::raw('count(*) as download_count'))
            ->paginate(20);

        return view('admin.download.index', compact('downloads'), [
            'title' => 'Quản lý tải xuống'
        ]);
    }
}
