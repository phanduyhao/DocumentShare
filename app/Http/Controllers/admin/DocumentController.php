<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use PhpOffice\PhpWord\IOFactory;
//use PhpOffice\PhpWord\Settings;
//use Dompdf\Dompdf;
//use Dompdf\Options;
use LaravelFileViewer;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cates = Category::all();
        $documents = Document::paginate(10);
        return view('admin.document.index',compact('documents','cates'),[
            'title' => 'Quản lý tài liệu'
        ]);
    }

    public function showEmbedView($url)
    {
        $info = Embed::create($url);

        return view('admin.document.index', ['info' => $info]);
    }

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
         if ($request->hasFile('file')) {
             $file = $request->file('file');
             $fileName = $file->getClientOriginalName(); // Lấy tên gốc của file
             // Lưu file vào thư mục lưu trữ
             $file->storeAs('public/files', $fileName);
             $document->file = $fileName;
         }

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
         $document->type = $request->type;
         $document->user_id = Auth::id();
         $document->cate_id = $request->cate_id;
//         $document->tag = $request->tag;
         $document->save();
         // Chuyển hướng về trang hiển thị danh sách document hoặc trang khác tùy theo yêu cầu của bạn
         return redirect()->back();
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Document $document)
    {
        // Kiểm tra xem document_id có tồn tại trong bảng Document hay không
        $document->title = $request->title;
        $document->desc = $request->desc;
        $document->slug = $request->slug;
        $document->parent_id = $request->parent_id;
        $document->tag = $request->tag;
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

//    Dùng LaravelFileViewer
    public function show($filename)
    {
        $filepath = storage_path("app/public/files/{$filename}");
        $file_url = asset("storage/files/{$filename}");
        $file_data = [
            [
                'label' => __('Label'),
                'value' => "Value"
            ]
        ];
        return view('vendor.laravel-file-viewer.previewFileOffice', compact('filename', 'filepath', 'file_data','file_url'),[
            'title' => $filename
        ]);
    }
}
