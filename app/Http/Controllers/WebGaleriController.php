<?php

namespace App\Http\Controllers;

use PDF;
use auth;
use App\Helper;
use App\Models\WebGaleri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class WebGaleriController extends Controller
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
    return view('kontenweb.galeri.index');
  }

  public function dt()
  {
    $data = WebGaleri::all();
    return DataTables::of($data)
    ->addColumn('tgl', function($data) {
      return Helper::tanggal($data->tglpublish);
    })
    ->addColumn('action', function($data) {
      return '<div style="white-space: nowrap">
        <form class="d-inline" id="btnhapus" action="'.route('web.galeri.delete').'" method="post">
            <input type="hidden" name="id" value="'.$data->id.'">
            <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" style="white-space: nowrap"><i data-feather="trash-2"></i> Hapus</button>
            '.csrf_field().'
        </form>      
      </div>';
    })
    ->make(true);
  }

  public function create()
  {
    return view('kontenweb.galeri.create');
  }

  public function store(Request $request)
  {
    try {
      // dd($request->all());
      $slug = Str::slug($request->judul);
      $gambar = null;
      if ($request->file('gambars') != null) {
        $namafile = $slug.'-'.$request->file('gambars')->getClientOriginalName().'.'.$request->file('gambars')->extension();
        $gambar =  $request->file('gambars')->storeAs('uploads/galeri',$namafile);
      }
      $request->merge([
        'gambar' => $gambar,
        'iduser' => Auth::user()->id
      ]);

      WebGaleri::create($request->all());

      return redirect('kontenweb/galeri')->with('notif', json_encode([
        'title' => "KONTEN GALERI",
        'text' => "Berhasil menambah foto baru di galeri.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "KONTEN GALERI",
        'text' => "Gagal menambah foto, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function delete(Request $request)
  {
    try {
      $gambarlama = WebGaleri::where('id',$request->id)->pluck('gambar')->first();
      Storage::delete($gambarlama);
      WebGaleri::where('id', $request->id)->delete();
      return back()->with('notif', json_encode([
          'title' => "KONTEN GALERI",
          'text' => "Berhasil menghapus foto di galeri",
          'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
          'title' => "KONTEN GALERI",
          'text' => "Gagal menghapus foto, " . $e->getMessage(),
          'type' => "error"
      ]));
    }
  }

}
