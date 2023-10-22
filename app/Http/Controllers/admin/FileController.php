<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $files = File::paginate(10);
        return view('admin.file.index',compact('files'),[
            'title' => 'Quản lý file'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'file' => 'required',
            'document_id' => 'required',
        ],[
            'file.required' => 'Vui lòng tải file !',
            'document_id.required' => 'Vui lòng chọn tài liệu',
        ]);
        // Kiểm tra xem file_id có tồn tại trong bảng File hay không
        $file = new File;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileSize = $file->getSize();
            $fileSizeKB = $fileSize / 1024;
            $file->size = round($fileSizeKB,2) . ' KB';
            $fileName = $file->getClientOriginalName(); // Lấy tên gốc của file
            $fileExtension = $file->getClientOriginalExtension(); // Lấy phần đuôi của file
            $file->storeAs('public/files', $fileName);
            $file->file = $fileName;
        }
        $file->save();
        // Chuyển hướng về trang hiển thị danh sách file hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required|unique:files',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề !',
            'slug.required' => 'Vui lòng nhập slug',
            'slug.unique' => 'Slug này đã tồn tại',
        ]);
        // Kiểm tra xem file_id có tồn tại trong bảng File hay không
        $file->title = $request->title;
        $file->desc = $request->desc;
        $file->slug = $request->slug;
        $file->parent_id = $request->parent_id;
        $file->tag = $request->tag;
        $file->save();
        // Chuyển hướng về trang hiển thị danh sách file hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $file = File::findOrFail($id);
        $file->delete();
        // Chuyển hướng về trang danh sách file hoặc trang khác (tuỳ ý)
        return response()->json(['message' => 'Danh mục đã được xóa thành công']);
    }

    public function deleteAllFiles() {
        File::trunfile(); // Xóa tất cả bản ghi
        return redirect()->back();
    }
}
