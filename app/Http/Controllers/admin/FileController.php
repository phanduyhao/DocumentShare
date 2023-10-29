<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\File;
use ConvertApi\ConvertApi;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        $files = File::paginate(10);
        return view('admin.file.index',compact('files','documents'),[
            'title' => 'Quản lý file'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'file' => 'required',
        ],[
            'file.required' => 'Vui lòng tải file !',
        ]);
        // Kiểm tra xem file_id có tồn tại trong bảng File hay không
        $files = new File;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileSize = $file->getSize();
            $fileSizeKB = $fileSize / 1024;
            $files->size = round($fileSizeKB, 2) . ' KB';
            $fileName = $file->getClientOriginalName(); // Lấy tên gốc của file
            $fileExtension = $file->getClientOriginalExtension(); // Lấy phần đuôi của file
            $file->storeAs('public/filesOrigin', $fileName);

            // Lưu tệp tin tạm thời
            $file->storeAs('public/files', $fileName);

            // Đường dẫn tệp tin tạm thời
            $tempFilePath = storage_path('app/public/files/' . $fileName);

            // Chuyển đổi tệp thành PDF
            ConvertApi::setApiSecret('6QSfRhA7Nr905F3u'); // Thay 'your-api-secret' bằng API Secret của bạn
            $result = ConvertApi::convert('pdf', ['File' => $tempFilePath]);

            // Lưu tệp PDF
            $pdfFileName = pathinfo($fileName, PATHINFO_FILENAME);
            $pdfFilePath = storage_path('app/public/files/' . $pdfFileName);
            $result->getFile()->save($pdfFilePath);
            $files->path =  $pdfFilePath;
            // Gán tên tệp PDF vào thuộc tính 'file'
            $files->file = $pdfFileName;

            // Xóa tệp tin tạm thời
            unlink($tempFilePath);
        }
        $files->document_id = $request->document_id;
        $files->save();
        // Chuyển hướng về trang hiển thị danh sách file hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        // Kiểm tra xem file_id có tồn tại trong bảng File hay không
        if ($request->hasFile('file')) {
            $files = $request->file('file');
            $fileSize = $files->getSize();
            $fileSizeKB = $fileSize / 1024;
            $file->size = round($fileSizeKB, 2) . ' KB';
            $fileName = $files->getClientOriginalName(); // Lấy tên gốc của file
            $fileExtension = $files->getClientOriginalExtension(); // Lấy phần đuôi của file
            $files->storeAs('public/filesOrigin', $fileName);

            // Lưu tệp tin tạm thời
            $files->storeAs('public/files', $fileName);

            // Đường dẫn tệp tin tạm thời
            $tempFilePath = storage_path('app/public/files/' . $fileName);

            // Chuyển đổi tệp thành PDF
            ConvertApi::setApiSecret('6QSfRhA7Nr905F3u'); // Thay 'your-api-secret' bằng API Secret của bạn
            $result = ConvertApi::convert('pdf', ['File' => $tempFilePath]);

            // Lưu tệp PDF
            $pdfFileName = pathinfo($fileName, PATHINFO_FILENAME);
            $pdfFilePath = storage_path('app/public/files/' . $pdfFileName);
            $result->getFile()->save($pdfFilePath);

            // Gán tên tệp PDF vào thuộc tính 'file'
            $file->file = $pdfFileName;

            // Xóa tệp tin tạm thời
            unlink($tempFilePath);
        }
        $files->document_id = $request->document_id;
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
        File::truncate(); // Xóa tất cả bản ghi
        return redirect()->back();
    }
}
