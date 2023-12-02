<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $cates = Category::all();
        $tags = Tag::all();
        $keyword = $request->input('keyword');
        $count_docs = Document::count();

        // Tìm kiếm tài liệu theo tên
        $documentsByName = Document::where('title', 'like', '%' . $keyword . '%')->get();

        // Tìm kiếm tài liệu theo danh mục
        $documentsByCategory = Document::whereHas('category', function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%');
        })->get();

        // Kết hợp kết quả từ cả hai truy vấn
        $searchResults = $documentsByName->merge($documentsByCategory);

        return view('admin.search', compact('searchResults','cates','tags','count_docs'),[
            'title' => 'Kết quả tìm kiếm cho từ khóa " ' . $keyword .' "'
        ]);
    }
}
