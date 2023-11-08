<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Document;
use App\Models\Setting;
use App\Models\User;
use App\Models\status;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ConvertApi\ConvertApi;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
//    Tài liệu đã duyệt
    public function index()
    {
        $tags = Tag::all();
        $statuses = status::all();
        $cates = Category::all();

//        Lấy các tài liệu Có Score = Null hoặc Score = 0;
        $documents = Document::where('status', '1')
            ->where(function ($query) {
                $query->whereNull('score')
                    ->orWhere('score', 0);
            })
            ->paginate(10);

//        Lấy các tài liệu Có Score # Null hoặc Score > 0;
        $document_vips = Document::where('status', '1')
            ->whereNotNull('score')
            ->where('score', '>', 0)
            ->paginate(10);

        return view('admin.document.index',compact('documents','document_vips','cates','tags','statuses'),[
            'title' => 'Tài liệu đã duyệt'
        ]);
    }


//    Tài liệu chờ duyệt
    public function loading()
    {
        $tags = Tag::all();
        $statuses = status::all();
        $cates = Category::all();
        $documents = Document::where('status','2')->paginate(10);
        return view('admin.document.loading',compact('documents','cates','tags','statuses'),[
            'title' => 'Tài liệu chờ duyệt'
        ]);
    }

//    Tài liệu bị hủy
    public function cancel()
    {
        $tags = Tag::all();
        $statuses = status::all();
        $cates = Category::all();
        $documents = Document::where('status','3')->paginate(10);
        return view('admin.document.cancel',compact('documents','cates','tags','statuses'),[
            'title' => 'Tài liệu đã hủy'
        ]);
    }

//    Duyệt bài
    public function ok(Request $request, Document $document)
    {
        $score = Setting::first();
        $document->status = 1;
        $document->score = $score->score_doc_ok;
        $document->save();
        // Chuyển hướng về trang hiển thị danh sách document hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

//    Hủy bài
    public function cancelAction(Request $request, Document $document)
    {
        $document->status = 3;
        $document->save();
        // Chuyển hướng về trang hiển thị danh sách document hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     */

//    Thêm mới
     public function store(Request $request)
     {
         $this->validate($request,[
             'title' => 'required',
             'slug' => 'required|unique:documents',
             'file' => 'required',
         ],[
             'title.required' => 'Vui lòng nhập tiêu đề !',
             'slug.required' => 'Vui lòng nhập slug',
             'slug.unique' => 'Slug này đã có',
             'file.required' => 'Vui lòng upload file',
         ]);

         $document = new Document;
         $document->title = $request->title;
         if ($request->hasFile('file')) {
             $file = $request->file('file');
             $fileSize = $file->getSize();
             $fileSizeKB = $fileSize / 1024;
             $document->size = round($fileSizeKB, 2) . ' KB';
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

             // Gán tên tệp PDF vào thuộc tính 'file'
             $document->file = $pdfFileName;

             // Xóa tệp tin tạm thời
             unlink($tempFilePath);
         }
         $document->description = $request->desc;
         $document->slug = $request->slug;
         $document->score = $request->score;
         $document->source = $request->source;
         $document->type = $fileExtension;
         $document->user_id = Auth::id();
         $document->cate_id = $request->cate_id;
         $document->tag_id = $request->tag_id;
         $document->status = 1;
         $document->save();
         // Chuyển hướng về trang hiển thị danh sách document hoặc trang khác tùy theo yêu cầu của bạn
         return redirect()->back();
     }

    /**
     * Update the specified resource in storage.
     */
//    Cập nhật
    public function update(Request $request, Document $document)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề !',
            'slug.required' => 'Vui lòng nhập slug',
        ]);

        $document->title = $request->title;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileSize = $file->getSize();
            $fileSizeKB = $fileSize / 1024;
            $document->size = round($fileSizeKB, 2) . ' KB';
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

            // Gán tên tệp PDF vào thuộc tính 'file'
            $document->file = $pdfFileName;

            // Xóa tệp tin tạm thời
            unlink($tempFilePath);
        }
        $document->description = $request->desc;
        $document->slug = $request->slug;
        $document->score = $request->score;
        $document->source = $request->source;
        $document->user_id = Auth::id();
        $document->cate_id = $request->cate_id;
        $document->tag_id = $request->tag_id;
        $document->status = 1;
        $document->save();
        // Chuyển hướng về trang hiển thị danh sách document hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
//    Xóa
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        // Chuyển hướng về trang danh sách document hoặc trang khác (tuỳ ý)
        return response()->json(['message' => 'Danh mục đã được xóa thành công']);
    }

//    Xem chi tiết
    public function show($slug)
    {
        $document = Document::where('slug', $slug)->first();
        if($document){
           $comments = Comment::all();
           // Tìm tài liệu dựa trên trường 'slug'
           $status = status::find($document->status);
           $status = $status->status;
           $cate = Category::find($document->cate_id);
           if($document->cate_id) {
               $cate_title = $cate->title;
           } else {
               $cate_title = "Chưa có danh mục !";
           }
           $user = User::find($document->user_id);
           $username = $user->name;
           $tag = Tag::find($document->tag_id);
           if($document->tag_id) {
               $tag_name = $tag->tag_name;
           } else {
               $tag_name = "Chưa có thẻ tag !";
           }
           $filename = $document->file;

           return view('admin.document.details', compact('filename','document','username','cate_title','tag_name','status','comments'),[
               'title' => $filename
           ]);
       }
    }

//    Xóa tất cả tài liệu đã duyệt
    public function deleteAllDocOk() {
        Document::where('status', 1)->delete(); // Xóa tất cả bản ghi có status = 2
        return redirect()->back();
    }

//    Xóa tất cả tài liệu đang chờ
    public function deleteAllDocLoading() {
        Document::where('status', 2)->delete(); // Xóa tất cả bản ghi có status = 2
        return redirect()->back();
    }

//    Xóa tất cả tài liệu bị hủy
    public function deleteAllDocCancel() {
        Document::where('status', 3)->delete(); // Xóa tất cả bản ghi có status = 2
        return redirect()->back();
    }

}
