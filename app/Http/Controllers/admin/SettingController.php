<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('admin.setting.index',compact('settings'),[
            'title' => 'Cài đặt Điểm'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $setting->score_register = $request->score_register;
        $setting->score_docs_ok = $request->score_admin_accept;
        $setting->docs_home = $request->docs_home;
        $setting->save();
        return redirect()->back();
    }

}
