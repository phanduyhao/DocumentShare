<?php

namespace App\Http\Controllers;

use App\Models\Payment_History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function Payment(Request $request)
    {
        try {
            $request->validate([
                'amount_money' => 'required|numeric|min:1000',
                'bank_code' => 'nullable|string'
            ]);
    
            // Tạo lịch sử thanh toán
            $checkout = new Payment_History();
            $checkout->order_code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
            $checkout->user_id = Auth::id();
            $checkout->amount_money = $request->amount_money;
            $checkout->save();
    
            // Cấu hình VNPAY
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = route('checkout.complete', ['code' => $checkout->order_code, 'amount_money' => $request->amount_money]);
            $vnp_TmnCode = "17AY5EOG";
            $vnp_HashSecret = "1GJ1Z7RJW93EQMSV7NANEDLF8TXUBSKX";
    
            $code_cart = rand(1000, 999999);
            $vnp_TxnRef = $code_cart;
            $vnp_Amount = $request->amount_money * 100;
            $vnp_IpAddr = $request->ip();
    
            $inputData = [
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => now()->format('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => "vn",
                "vnp_OrderInfo" => "Thanh toán đơn hàng #" . $checkout->order_code,
                "vnp_OrderType" => "billpayment",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
            ];
    
            if (!empty($request->bank_code)) {
                $inputData["vnp_BankCode"] = $request->bank_code;
            }
    
            ksort($inputData);
            $query = http_build_query($inputData);
            $hashdata = urldecode(http_build_query($inputData));
    
            if (!empty($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                $query .= "&vnp_SecureHash=" . $vnpSecureHash;
            }
    
            $paymentUrl = $vnp_Url . "?" . $query;
    
            // 🔥 Thay vì trả về JSON, ta redirect thẳng đến URL thanh toán
            return redirect()->away($paymentUrl);
    
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Lỗi xử lý thanh toán: ' . $e->getMessage());
        }
    }
    

    public function complete(Request $request, $code)
    {
        $maCode = $code;
        $amount_money = $request->query('amount_money');
        if ($maCode) {
            $checkout = Payment_History::where("order_code", $maCode)->first();
            if ($checkout) {
                if ($request->isMethod('get') && $request->filled('vnp_ResponseCode')) {
                    $checkout->BankCode = $request->input('vnp_BankCode');
                    $checkout->TransactionNo = $request->input('vnp_TransactionNo');
                    $checkout->vnp_BankTranNo = $request->input('vnp_BankTranNo');
                    $checkout->vnp_ResponseCode = $request->input('vnp_ResponseCode');
                    $checkout->save();
                    if($request->input('vnp_BankTranNo') == null) {
                        $check = false;
                    }
                }
                $user = Auth::user();
                $user->save();
            }
            if($request->input('vnp_BankTranNo') == null){
                return redirect()->route('home');
            }else{
                return view('vnpay.complete', compact("checkout", "amount_money", "score"),[
                    'title' => 'Thanh toán thành công!'
                ]);
            }
        }
    }
}
