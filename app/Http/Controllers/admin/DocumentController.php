<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use App\Models\status;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
//use PhpOffice\PhpWord\IOFactory;
//use PhpOffice\PhpWord\Settings;
//use Dompdf\Dompdf;
//use Dompdf\Options;
use ConvertApi\ConvertApi;
//use LaravelFileViewer;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        $statuses = status::all();
        $cates = Category::all();
        $documents = Document::paginate(10);
        return view('admin.document.index',compact('documents','cates','tags','statuses'),[
            'title' => 'Quản lý tài liệu'
        ]);
    }
//
//    public function showEmbedView($url)
//    {
//        $info = Embed::create($url);
//
//        return view('admin.document.index', ['info' => $info]);
//    }

    /**
     * Store a newly created resource in storage.
     */

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
         $title = $document->title;
         $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload

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

//         if ($thumb) {
//             $fileName = Str::slug($title) . '.jpg'; // Tên ảnh theo Slug Title
//             $thumb->storeAs('public/images/thumb_files', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
//             $document->thumb = $fileName; // Lưu tên file ảnh theo slug Title
//         }
//         if ($request->hasFile('file')) {
//             $file = $request->file('file');
//             $fileSize = $file->getSize();
//             $fileSizeKB = $fileSize / 1024;
//             $document->size = round($fileSizeKB,2) . ' KB';
//             $fileName = $file->getClientOriginalName(); // Lấy tên gốc của file
//             $fileExtension = $file->getClientOriginalExtension(); // Lấy phần đuôi của file
//             $file->storeAs('public/files', $fileName);
//             $document->file = $fileName;
//         }

//         Chuyển PDF

//         if ($request->hasFile('file')) {
//             $file = $request->file('file');
//             $fileName = $file->getClientOriginalName();
//             $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
//
//             $file->storeAs('public/files', $fileName);
//
//             $domPdfPath = base_path('vendor/dompdf/dompdf');
//             Settings::setPdfRendererPath($domPdfPath);
//             Settings::setPdfRendererName('DomPDF');
//
//             $content = IOFactory::load(storage_path("app/public/files/{$fileName}"));
//
//             $pdfWriter = IOFactory::createWriter($content, 'PDF');
//
//             $sourcePath = storage_path("app/public/PdfFiles/{$fileNameWithoutExtension}.pdf");
//             $destinationPath = storage_path("app/public/PdfFiles/{$fileNameWithoutExtension}.pdf");
//
//             $pdfWriter->save($sourcePath);
//
//             // Move the PDF file from source to destination
//             rename($sourcePath, $destinationPath);
//
//             $document->file = "{$fileNameWithoutExtension}.pdf";
//         }
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
        $title = $document->title;
        $thumb = $request->file('thumb'); // Lấy file ảnh từ file Upload
        if ($thumb) {
            $fileName = Str::slug($title) . '.jpg'; // Tên ảnh theo Slug Title
            $thumb->storeAs('public/images/thumb_files', $fileName); // Lưu ảnh đã thêm vào đường dẫn này
            $document->thumb = $fileName; // Lưu tên file ảnh theo slug Title
        }
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileSize = $file->getSize();
            $fileSizeKB = $fileSize / 1024;
            $document->size = round($fileSizeKB,2) . ' KB';
            $fileName = $file->getClientOriginalName(); // Lấy tên gốc của file
            $fileExtension = $file->getClientOriginalExtension(); // Lấy phần đuôi của file
            $file->storeAs('public/files', $fileName);
            $document->file = $fileName;
            $document->type = $fileExtension;
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
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        // Chuyển hướng về trang danh sách document hoặc trang khác (tuỳ ý)
        return response()->json(['message' => 'Danh mục đã được xóa thành công']);
    }

    public function show($slug)
    {
        // Tìm tài liệu dựa trên trường 'slug'
        $document = Document::where('slug', $slug)->first();
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

        return view('admin.document.details', compact('filename','document','username','cate_title','tag_name','status'),[
            'title' => $filename
        ]);
//        $filepath = storage_path("app/public/files/{$filename}.pdf");
//        $file_url = asset("storage/files/{$filename}.pdf");
//        $file_data = [
//            [
//                'label' => __('Label'),
//                'value' => "Value"
//            ]
//        ];
//        return view('vendor.laravel-file-viewer.previewFileOffice', compact('filename', 'filepath', 'file_data','file_url','document','username','cate_title','tag_name','status'),[
//            'title' => $filename
//        ]);
    }

    public function deleteAllDoc() {
        Document::truncate(); // Xóa tất cả bản ghi
        return redirect()->back();
    }

}
