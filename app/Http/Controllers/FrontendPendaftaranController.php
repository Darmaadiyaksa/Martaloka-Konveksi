<?php

namespace App\Http\Controllers;

use App\Helper;
use Notification;
use App\Models\User;
use App\Models\Daftar;
use App\Models\DaftarDetil;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DaftarKeluarga;
use App\Http\Controllers\Controller;
use App\Notifications\DaftarSuccess;
use Illuminate\Support\Facades\Hash;

class FrontendPendaftaranController extends Controller
{
  public function index()
  {
    return view('frontend.pendaftaran');
  }

  public function refreshcaptcha()
  {
    return Response()->json(['captcha'=>captcha_img()]);
  }

  public function store(Request $request)
  {
    try {
      $request->validate(
        [
          'captcha' => 'required|captcha'
        ],
        [
          'captcha.captcha'=>'The given data was invalid.'
        ]
      );

      $cekemail = User::where('username',$request->email)->count();
      if ($cekemail > 0) {
        return back()->with('notif', json_encode([
          'title' => "REGISTRASI",
          'text' => "Gagal melakukan registrasi, Email sudah terdaftar.",
          'type' => "danger"
        ]));
      }

      $ceknik = Daftar::where('nik',$request->nik)->count();
      if ($ceknik > 0) {
        return back()->with('notif', json_encode([
          'title' => "REGISTRASI",
          'text' => "Gagal melakukan registrasi, NIK sudah terdaftar.",
          'type' => "danger"
        ]));
      }

      $nourut = Daftar::wheremonth('created_at',date('m'))->count();
      $nourut = str_pad($nourut+1, 4, '0', STR_PAD_LEFT);
      $nodaftar = 'DA-'.date('ymd').$nourut;
      // 1. insert ke Daftar
      $daftar = Daftar::create([
        "tgl" => date('Y-m-d'),
        "nodaftar" => $nodaftar,
        "nama" =>$request->nama,
        "email" => $request->email,
        "nik" => $request->nik,
        "telpon" => $request->telpon,
      ]);
      // 2. insert ke daftar Detil
      DaftarDetil::create([
        'iddaftar' => $daftar->id,
      ]);
      // 3. insert ke daftar Keluarga
      DaftarKeluarga::create([
        'iddaftar' => $daftar->id,
      ]);
      // 4. insert ke USER
      $password = (Str::random(6));
      User::create([
        'username' => $request->email,
        'password' => bcrypt($password),
        'role' => 3,
        'link' => $daftar->id,
        'remember_token' => Str::random(40),
      ]);
      // 5. kirim email
      $data =[
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => $password
      ];
      Notification::route('mail',$request->email)->notify(new DaftarSuccess($data));
      return back()->with('notif', json_encode([
        'title' => "REGISTRASI",
        'text' => "Berhasil melakukan registrasi, informasi Akun telah dikirim ke alamat email $request->email.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      if ($e->getMessage() == 'The given data was invalid.') {
        $pesan = 'Captcha SALAH, silakan diulangi!';
      }else {
        $pesan = $e->getMessage();
      }
      return back()->with('notif', json_encode([
        'title' => "REGISTRASI",
        'text' => "Gagal melakukan registrasi, $pesan",
        'type' => "error"
      ]));
    }
  }
}
