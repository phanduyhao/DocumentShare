<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use App\Models\UsersAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use function Spatie\FlareClient\message;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

//    Đăng ký
    public function showRegistrationForm()
    {
        return view('auth.register',[
            'title' => 'Đăng ký tài khoản'
        ]);
    }

    public function register(Request $request)
    {
        $score = Setting::first();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên của bạn !',
            'email.required' => 'Vui lòng nhập email !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã tồn tại'
        ]);
        $confirmPass = $request->confirmPassword;
        $pass = $request->password;
        if ($confirmPass == $pass) {
            // Kiểm tra xem email đã tồn tại chưa
            $emailExists = User::where('email', $request->email)->exists();

            if (!$emailExists) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => 'user', // Gán mặc định là 'user'
                    'level' => 0, // Gán mặc định là 0
                    'score' => $score->score_register,
                ]);
                Auth::login($user);
            } else {
                return back()->with('error', 'Email đã tồn tại');
            }
        } else {
            return back()->with('error', 'Xác nhận lại mật khẩu !');
        }
        return redirect('/'); // Điều hướng sau khi đăng ký
    }


//    Đăng nhập thường
    public function showLoginForm()
    {
        return view('auth.login',[
            'title' => 'Đăng nhập'
        ]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Vui lòng nhập email !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'email.email' => 'Email không hợp lệ'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->level == 0) {
                return redirect('/');
            } else {
                return redirect('/admin');
            }
        }

        return back()->with('error', 'Thông tin đăng nhập chưa chính xác !');
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

//    Đăng nhập bằn GOOGLE
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Xử lý dữ liệu người dùng và đăng nhập
        return redirect('/');
    }



//    Quên mật khẩu
    public function showLinkRequestForm()
    {
        return view('auth.forgetPass',[
            'title' => 'Quên mật khẩu'
        ]);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            Session::flash('success', 'Đã gửi xác thực đến Gmail');
            return back();
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

//    Đặt lại mật khẩu
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.resetPass',[
            'title' => 'Đặt lại mật khẩu'
        ])->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
