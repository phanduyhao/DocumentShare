<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Favourite;
use App\Models\View;
use Illuminate\Http\Request;

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
}
