<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cate_parents = Category::all();
        $cates = Category::paginate(10);
        return view('admin.cate.index',compact('cates','cate_parents'),[
            'title' => 'Quản lý danh mục'
        ]);
    }

    public function store(Categories $request)
    {

        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $cate = new Category;
        $cate->title = $request->title;
        $cate->desc = $request->desc;
        $cate->slug = $request->slug;
        $cate->parent_id = $request->parent_id;
        $cate->tag = $request->tag;
        $cate->save();
        // Chuyển hướng về trang hiển thị danh sách cate hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Categories $request, Category $cate)
    {
        // Kiểm tra xem cate_id có tồn tại trong bảng Cate hay không
        $cate->title = $request->title;
        $cate->desc = $request->desc;
        $cate->slug = $request->slug;
        $cate->parent_id = $request->parent_id;
        $cate->tag = $request->tag;
        $cate->save();
        // Chuyển hướng về trang hiển thị danh sách cate hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cate = Category::findOrFail($id);
        $cate->delete();
        // Chuyển hướng về trang danh sách cate hoặc trang khác (tuỳ ý)
        return response()->json(['message' => 'Danh mục đã được xóa thành công']);
    }

}