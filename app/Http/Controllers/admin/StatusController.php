<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = status::all();
        return view('admin.status.index',compact('statuses'),[
            'title' => 'Quản lý trạng thái'
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'status' => 'required',
        ],[
            'status.required' => 'Vui lòng nhập trạng thái !',
        ]);
        // Kiểm tra xem status_id có tồn tại trong bảng Cate hay không
        $status = new status;
        $status->status = $request->status;
        $status->save();
        // Chuyển hướng về trang hiển thị danh sách status hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, status $status)
    {
        $this->validate($request,[
            'status' => 'required',
        ],[
            'status.required' => 'Vui lòng nhập trạng thái !',
        ]);
        // Kiểm tra xem status_id có tồn tại trong bảng Cate hay không
        $status->status = $request->status;
        $status->save();
        // Chuyển hướng về trang hiển thị danh sách status hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }


}
