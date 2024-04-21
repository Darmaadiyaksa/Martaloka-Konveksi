<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengaturanProfilController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $data = Profil::where('id',1)->first();
    return view('pengaturan.profil.index', compact('data'));
  }

  public function update(Request $request)
  {
    try {
      Profil::where('id',1)->update($request->except(['_token']));

      return back()->with('notif', json_encode([
        'title' => "PROFIL PERUSAHAAN",
        'text' => "Berhasil memperbarui profil perusahaan.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "PROFIL PERUSAHAAN",
        'text' => "Gagal memperbarui profil perusahaan, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

}
