<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use Dompdf\Dompdf;
use Dompdf\Options;

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

         // Kiểm tra xem document_id có tồn tại trong bảng Document hay không
         $document = new Document;
         $document->title = $request->title;
//         if ($request->hasFile('file')) {
//             $file = $request->file('file');
//             $fileName = $file->getClientOriginalName(); // Lấy tên gốc của file
//             // Lưu file vào thư mục lưu trữ
//             $file->storeAs('public/files', $fileName);
//             $document->file = $fileName;
//         }

//         if ($request->hasFile('file')) {
//             $file = $request->file('file');
//             $fileName = $file->getClientOriginalName(); // Get the original file name
//             $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);
//
//             // Store the file in the storage directory
//             $file->storeAs('public/files', $fileName);
//
//             // Set the DomPDF path
//             $domPdfPath = base_path('vendor/dompdf/dompdf');
//             Settings::setPdfRendererPath($domPdfPath);
//             Settings::setPdfRendererName('DomPDF');
//
//             // Load the Word document
//             $content = IOFactory::load(storage_path("app/public/files/{$fileName}"));
//
//             // Create a writer to convert to PDF
//             $pdfWriter = IOFactory::createWriter($content, 'PDF');
//
//             // Set source and destination paths for the PDF file
//             $sourcePath = storage_path("app/public/PdfFiles/{$fileNameWithoutExtension}.pdf");
//             $destinationPath = storage_path("app/public/PdfFiles/{$fileNameWithoutExtension}.pdf");
//
//             // Save the PDF file
//             $pdfWriter->save($sourcePath);
//
//// Move the PDF file from source to destination
//             rename($sourcePath, $destinationPath);
//
//// Set the PDF file name for the document's file attribute
//             $document->file = "{$fileNameWithoutExtension}.pdf";
//         }


         if ($request->hasFile('file')) {
             $file = $request->file('file');
             $fileName = $file->getClientOriginalName();
             $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME);

             $file->storeAs('public/files', $fileName);

             $domPdfPath = base_path('vendor/dompdf/dompdf');
             Settings::setPdfRendererPath($domPdfPath);
             Settings::setPdfRendererName('DomPDF');

             $content = IOFactory::load(storage_path("app/public/files/{$fileName}"));

             $pdfWriter = IOFactory::createWriter($content, 'PDF');

             $sourcePath = storage_path("app/public/PdfFiles/{$fileNameWithoutExtension}.pdf");
             $destinationPath = storage_path("app/public/PdfFiles/{$fileNameWithoutExtension}.pdf");

             $pdfWriter->save($sourcePath);

             // Move the PDF file from source to destination
             rename($sourcePath, $destinationPath);

             $document->file = "{$fileNameWithoutExtension}.pdf";
         }



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

//    public function show($filename)
//    {
//        return view('admin.document.pdf_viewer', compact('filename'),[
//            'title' => $filename
//        ]);
//    }
}
