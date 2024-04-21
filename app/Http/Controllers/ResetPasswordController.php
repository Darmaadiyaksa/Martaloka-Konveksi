<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Notification;
use App\Notifications\ResetPassword;
use App\Models\Pegawai;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function __construct()
    {
    }

    public function sendemail(Request $request)
    {
      $cekuser = User::with(['pegawai'])->where('username',$request->username)->first();
      if ($cekuser !=null) {
        Notification::route('mail',$request->username)->notify(new ResetPassword($cekuser));
      }else {
        return back()->with('notif', json_encode([
            'title' => "RESET PASSWORD",
            'text'  => "Username / email tidak ditemukan, pastikan Anda mengisi alamat email yang sudah terdaftar.",
            'type'  => "error"
        ]));
      }
      return back()->with('notif', json_encode([
          'title' => "RESET PASSWORD",
          'text'  => "Tautan untuk reset password telah dikirim melalui email, silakan periksa kotak masuk pada email Anda.",
          'type'  => "success"
      ]));
    }

    public function newpassword($token)
    {
        $user = User::where('remember_token',$token)->first();
        if ($user != null) {
          return view('auth.newpassword',compact('user'));
        }else {
          abort('404');
        }
    }

    public function storepassword(Request $request)
    {
      User::where('id',$request->id)->update([
        'password' =>bcrypt($request->password)
      ]);
      return redirect('/')->with('notif', json_encode([
          'title' => "RESET PASSWORD",
          'text'  => "Password berhasil diubah.",
          'type'  => "success"
      ]));;
    }

    public function reset()
    {
      return view('auth.sendreset');
    }
}
