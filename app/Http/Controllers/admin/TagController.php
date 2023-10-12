<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $cates = Category::all();
        $documents = Document::all();
        $tags = Tag::paginate(10);
        return view('admin.tag.index',compact('tags','documents','cates'),[
            'title' => 'Quản lý tag'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'tag_name' => 'required',
        ],[
            'tag_name.required' => 'Vui lòng nhập trạng thái !',
        ]);
        // Kiểm tra xem tag_id có tồn tại trong bảng Tag hay không
        $tag = new Tag;
        $tag->tag_name = $request->tag_name;
        $tag->cate_id = $request->cate_id;
        $tag->document_id = $request->document_id;
        $tag->save();
        // Chuyển hướng về trang hiển thị danh sách tag hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,[
            'tag_name' => 'required',
        ],[
            'tag_name.required' => 'Vui lòng nhập trạng thái !',
        ]);
        // Kiểm tra xem tag_id có tồn tại trong bảng Tag hay không
        $tag->tag_name = $request->tag_name;
        $tag->cate_id = $request->cate_id;
        $tag->document_id = $request->document_id;
        $tag->save();
        // Chuyển hướng về trang hiển thị danh sách tag hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        // Chuyển hướng về trang danh sách tag hoặc trang khác (tuỳ ý)
        return response()->json(['message' => 'Tag đã được xóa thành công']);
    }
}
