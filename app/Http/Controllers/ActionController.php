<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Download;
use App\Models\Favourite;
use App\Models\Rate;
use App\Models\View;
use ConvertApi\ConvertApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\RateCreated;

class ActionController extends Controller
{

//    Download
    public function download(Request $request) {
        $download = new Download;
        $download->document_id = $request->input('document_id');
        $download->user_id = $request->input('user_id');
        $download->save();
        return response()->json(['message' => 'Tải xuống đã được ghi nhận.']);
    }

//    Update Score
    public function updateScore(Request $request){
        $user = Auth::user();
        $user->score = $request->input('user_score');
        $user->save();
        return response()->json(['message' => 'Cập nhật điểm thành công !.']);

    }

//    View
    public function view(Request $request) {
        $view = new View;
        $view->document_id = $request->input('document_id');
        $view->user_id = $request->input('user_id');
        $view->save();
        return response()->json(['message' => 'Xem tài liệu thành công!.']);
    }
//    public function view($slug){
//        // Tìm tài liệu dựa vào slug
//        $document = Document::where('slug', $slug)->firstOrFail();
//
//        // Tăng lượt xem
//        $document->views += 1;
//        $document->save();
//
//        // Các logic hiển thị trang chi tiết tài liệu
//        return view('documents.show', compact('document'));
//    }

//    Favourite
    public function favourite(Request $request) {
        $documentId = $request->input('document_id');
        $userId = $request->input('user_id');

        // Kiểm tra xem đã có bản ghi có user_id và document_id tương ứng chưa
        $existingRecord = Favourite::where('document_id', $documentId)
            ->where('user_id', $userId)
            ->first();

        if (!$existingRecord) {
            $favourite = new Favourite;
            $favourite->document_id = $documentId;
            $favourite->user_id = $userId;
            $favourite->save();
            return response()->json(['success' => true, 'message' => 'Yêu thích thành công!']);
        }
    }

//    Bỏ thích
    public function unfavourite(Request $request) {
        $documentId = $request->input('document_id');
        $userId = $request->input('user_id');

        // Xóa bản ghi khỏi bảng favourites
        Favourite::where('document_id', $documentId)
            ->where('user_id', $userId)
            ->delete();

        return response()->json(['success' => true, 'message' => 'Đã bỏ yêu thích!']);
    }

//    Rating

    public function rate(Request $request){
        $rate = new Rate;
        $rate->document_id = $request->input('document_id');
        $rate->user_id = $request->input('user_id');
        $rate->rates = $request->input('rate');
        $rate->save();
        event(new RateCreated($rate));

        return response()->json(['success' => true, 'message' => 'Đánh giá thành công!']);
    }

//    AVG Rating
//
//    public function avg_rate(Request $request){
//        $averageRates = DB::table('rates')
//            ->select('document_id', DB::raw('AVG(rates) as average_rate'))
//            ->groupBy('document_id')
//            ->get();
//    }

    public function upload(Request $request){
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

            // Lưu tệp tin tạm thời
            $tempFilePath = public_path('temp/files/' . $fileName);
            $file->move(public_path('temp/files'), $fileName);

            // Chuyển đổi tệp thành PDF
            ConvertApi::setApiSecret('6QSfRhA7Nr905F3u');
            $result = ConvertApi::convert('pdf', ['File' => $tempFilePath]);

            // Lưu tệp PDF
            $pdfFileName = pathinfo($fileName, PATHINFO_FILENAME);
            $pdfFilePath = public_path('temp/files/' . $pdfFileName);
            $result->getFile()->save($pdfFilePath);
            $document->file = $pdfFileName;
            $destinationPath = public_path('temp/filesOrigin');
            copy($tempFilePath, $destinationPath . '/' . $fileName);
            // Xóa tệp tin tạm thời
            unlink($tempFilePath);

        }
        $document->description = $request->desc;
        $document->slug = $request->slug;
        if($request->score == null){
            $document->score = 0;
        }else{
            $document->score = $request->score;
        }
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

}
