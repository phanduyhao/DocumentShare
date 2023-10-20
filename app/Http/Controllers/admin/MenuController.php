<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::paginate(10);
        return view('admin.menu.index',compact('menus'),[
            'title' => 'Quản lý Menu'
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required|unique:menus',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề !',
            'slug.required' => 'Vui lòng nhập slug',
            'slug.unique' => 'Slug này đã tồn tại',
        ]);
        // Kiểm tra xem menu_id có tồn tại trong bảng Menu hay không
        $menu = new Menu;
        $menu->title = $request->title;
        $menu->desc = $request->desc;
        $menu->slug = $request->slug;
        $menu->parent_id = $request->parent_id;
        $menu->level = $request->level;
        $menu->order = $request->order;
        $menu->active = $request->active ? 1 : 0;
        $menu->save();
        // Chuyển hướng về trang hiển thị danh sách menu hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => 'required|unique:menus',
        ],[
            'title.required' => 'Vui lòng nhập tiêu đề !',
            'slug.required' => 'Vui lòng nhập slug',
            'slug.unique' => 'Slug này đã tồn tại',
        ]);
        // Kiểm tra xem menu_id có tồn tại trong bảng Menu hay không
        $menu->title = $request->title;
        $menu->desc = $request->desc;
        $menu->slug = $request->slug;
        $menu->parent_id = $request->parent_id;
        $menu->level = $request->level;
        $menu->order = $request->order;
        $menu->active = $request->active ? 1 : 0;
        $menu->save();
        // Chuyển hướng về trang hiển thị danh sách menu hoặc trang khác tùy theo yêu cầu của bạn
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        // Chuyển hướng về trang danh sách menu hoặc trang khác (tuỳ ý)
        return response()->json(['message' => 'Danh mục đã được xóa thành công']);
    }

    public function deleteAllMenus() {
        Menu::truncate(); // Xóa tất cả bản ghi
        return redirect()->back();
    }
}
