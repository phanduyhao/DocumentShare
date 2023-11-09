<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Favourite;
use App\Models\Rate;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

//    Rating

    public function rate(Request $request){
        $rate = new Rate;
        $rate->document_id = $request->input('document_id');
        $rate->user_id = $request->input('user_id');
        $rate->rates = $request->input('rate');
        $rate->save();
<<<<<<< HEAD
//        event(new RateCreated($rate));
=======
        event(new RateCreated($rate));
>>>>>>> f2c7389ac3cb13c8ba21f3c2ee2c19c43e10fea7

        return response()->json(['success' => true, 'message' => 'Đánh giá thành công!']);
    }
}
