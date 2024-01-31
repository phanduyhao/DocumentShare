<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Models\Favourite;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class SearchMainController extends Controller
{
    public function search(Request $request)
    {
        $favourites = Favourite::where('user_id', Auth::id())->get();
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

        // Phân trang kết quả
        $currentPage = Paginator::resolveCurrentPage('page') ?: 1;
        $perPage = 9;
        $currentResults = $searchResults->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $searchResults = new LengthAwarePaginator($currentResults, count($searchResults), $perPage, $currentPage, [
            'path' => Paginator::resolveCurrentPath(),
        ]);

        return view('layout.search', compact('searchResults', 'cates', 'tags', 'count_docs', 'favourites','keyword'), [
            'title' => 'Kết quả tìm kiếm cho từ khóa " ' . $keyword . ' "'
        ]);
    }
}
