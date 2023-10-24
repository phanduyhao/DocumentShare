<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('level', 0)->with('children')->get();
        return view('menu.index', compact('menus'));
    }
}
