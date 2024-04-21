<?php

namespace App\Http\Controllers;

use App\Helper;
use Notification;
use App\Models\WebBlog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MdInformasiJenis;
use App\Http\Controllers\Controller;
use App\Notifications\DaftarSuccess;
use Illuminate\Support\Facades\Hash;

class FrontendInformasiController extends Controller
{
  public function index(Request $request)
  {
    $pencarian = $request->pencarian;
    $idjenis = $request->kategori;
    $idjenis = MdInformasiJenis::where('nama',$idjenis)->selectraw('id')->first();

    $data = WebBlog::with('jenis')->where('status', 1)
    ->when(!empty($pencarian), function ($query) use ($pencarian) {
        return $query->where('judul', 'like', '%'.$pencarian.'%');
    })
    ->when(!empty($idjenis), function ($query) use ($idjenis) {
      return $query->where('idjenis', $idjenis->id);
    })
    ->orderby('tglpublish','desc')->paginate(5);

    $jenis = MdInformasiJenis::withcount('blog')->get();
    $semua = WebBlog::where('status',1)->count();
    $populer = WebBlog::where('status',1)->orderby('klik','desc')->take(3)->get();

    return view('frontend.informasi', compact('jenis','semua','data','populer'));
  }

  public function detail($slug)
  {
    $data = WebBlog::with('jenis')->where('slug',$slug)->first();

    $jenis = MdInformasiJenis::withcount('blog')->get();
    $semua = WebBlog::where('status',1)->count();
    $populer = WebBlog::where('status',1)->orderby('klik','desc')->take(3)->get();
    WebBlog::where('slug',$slug)->update([
      'klik' => $data->klik+1
    ]);
    return view('frontend.informasi_detail', compact('data','jenis','populer','semua'));
  }

}
