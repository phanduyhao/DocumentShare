<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use Illuminate\Support\Str;

class SlideController extends Controller
{

    public function index()
    {
        $slides = Slide::paginate(10);
        return view('admin.slide.index',compact('slides'),[
            'title' => 'Quản lý Slide'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required', // Kiểm tra đã nhập Email chưa, có đúng định dạng Email không ?
            'image' => 'required', // Kiểm tra đã nhập mật khẩu chưa ?
            'link' => 'required'
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề Slide !',
            'link.required' => 'Vui lòng nhập link !',
            'image.required' => 'Vui lòng thêm ảnh!'
        ] );
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $slide = new Slide;
        $title = $request->title;
        $slide->title = $title;
        $image = $request->file('image'); // Lấy file ảnh từ file Upload
        if ($image) {
            $fileName = Str::slug($title) . '.jpg'; // Tên ảnh theo Slug Title
            $image->move(public_path('temp/images/slide'), $fileName); // Di chuyển ảnh vào thư mục này

            $slide->image = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $slide->link = $request->link;
        $slide->active = $request->active ? 1 : 0;
        $slide->save();
        // Chuyển hướng về trang hiển thị danh sách slide hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $title = $request->title;
        $slide->title = $title;
        $image = $request->file('image'); // Lấy file ảnh từ file Upload
        if ($image) {
            $fileName = Str::slug($title) . '.jpg'; // Tên ảnh theo Slug Title
            $image->move(public_path('temp/images/slides'), $fileName); // Di chuyển ảnh vào thư mục này

            $slide->image = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $slide->link = $request->link;
        $slide->active = $request->active ? 1 : 0;
        $slide->save();
        // Chuyển hướng về trang hiển thị danh sách slide hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        // Chuyển hướng về trang danh sách cate hoặc trang khác (tuỳ ý)
        return response()->json(['message' => 'Slide đã được xóa thành công']);
    }

    public function deleteAllSlides() {
        Slide::truncate(); // Xóa tất cả bản ghi
        return redirect()->back();
    }
}
