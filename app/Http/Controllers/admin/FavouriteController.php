<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favourites = Favourite::paginate(20);
        return view('admin.favourite.index',compact('favourites'),[
            'title' => 'Quản lý lượt yêu thích'
        ]);
    }

}
