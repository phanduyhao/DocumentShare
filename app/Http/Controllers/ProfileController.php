<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Favourite;
use App\Models\Payment_History;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileController extends Controller
{

    public function index()
    {
        $user= Auth::user();
        return view('user.profile',compact('user'),[
            'title' => 'Trang cá nhân'
        ]);
    }

    // Tài liệu yêu thích
    public function favourite(){
        $favourites = Favourite::where('user_id',Auth::id())->get();
        $docs = Favourite::where('user_id',Auth::id())->paginate(9);
        return view('user.favourite_docs',compact('docs','favourites'),[
            'title' => 'Tài liệu yêu thích'
        ]);
    }

    // Cập nhật thông tin
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên!',
            'email.required' => 'Vui lòng nhập email',
        ]);
        $user->name = $request->name;
        $name = $user->name;
        $avatar = $request->file('avatar'); // Lấy file ảnh từ file Upload
        if ($avatar) {
            $fileName = Str::slug($name) . '.jpg'; // Tên ảnh theo Slug Title
            $avatar->move(public_path('temp/images/avatars'), $fileName); // Di chuyển ảnh vào thư mục này
            $user->avatar = $fileName; // Lưu tên file ảnh theo slug Title
        }
        $pass = Auth::user()->password;
        if ($request->has('password')) {
            $user->password = bcrypt($request->password);
        }else{
            $user->password = $pass;
        }
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->date = $request->date;
        $user->sex = $request->sex;
        $user->save();

        return redirect()->back();
    }

    // Đổi mật khẩu
    public function resetPassword(Request $request)
    {
        $user = Auth::user();
        // Lấy dữ liệu từ yêu cầu Ajax
        $oldPassword = $request->input('old_pass');
        $newPassword = $request->input('new_pass');
        $confirmPassword = $request->input('confirm_pass');
        if (Hash::check($oldPassword, $user->password)) {
            if($newPassword == $confirmPassword){
                $user->password = bcrypt($newPassword);
                $user->save();
                return response()->json(['success' => true, 'message' => 'Thay đổi mật khẩu thành công']);
            }else{
                return response()->json(['success' => false, 'errors' => ['new_pass' => 'Mật khẩu mới và xác nhận mật khẩu không khớp']]);
            }
        } else {
            return response()->json(['success' => false, 'errors' => ['old_pass' => 'Mật khẩu hiện tại không chính xác']]);
        }
    }

    // Tự động cộng điểm khi tài liệu được tải xuống
    public function plusScoreUserByDocDown(Request $request)
    {
        $userId = $request->input('author_id');
        $user = User::find($userId);
        if ($user && $user->id != Auth::user()->id) {
            $score_doc = $request->input('score_doc');
            $score_doc = floatval($score_doc);
            $score_plus = $score_doc / 100 * 20;
            $user->score += $score_plus;
            $user->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => true]);
    }

    // Lịch sử nạp tiền
    public function paymentHistory(){
        $payment_histories = Payment_History::where('user_id', '=', Auth::user()->id)->orderByDesc('created_at')->get();
        return view('user.payment_history', compact('payment_histories'),[
            'title' => 'Lịch sử nạp tiền'
        ]);
    }
}
