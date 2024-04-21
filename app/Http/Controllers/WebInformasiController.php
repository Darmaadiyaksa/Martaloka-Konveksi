<?php

namespace App\Http\Controllers;

use PDF;
use auth;
use App\Helper;
use App\Models\WebBlog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class WebInformasiController extends Controller
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
    return view('kontenweb.informasi.index');
  }

  public function dt()
  {
    $data = WebBlog::with(['jenis'])->get();
    return DataTables::of($data)
    ->addColumn('tgl', function($data) {
      return Helper::tanggal($data->tglpublish);
    })
    ->addColumn('action', function($data) {
      return '<div style="white-space: nowrap">
        <a href='.route("web.informasi.edit",$data->id).' class="btn btn-outline-warning btn-sm waves-effect waves-float waves-light" style="white-space: nowrap"><i data-feather="edit"></i> Edit</a>
        <a href='.route("informasi.detail",$data->slug).' class="btn btn-icon btn-outline-info btn-sm waves-effect waves-float waves-light" style="white-space: nowrap" target="_blank"><i data-feather="eye"></i></a>
        <form class="d-inline" id="btnhapus" action="'.route('web.informasi.delete').'" method="post">
            <input type="hidden" name="id" value="'.$data->id.'">
            <button type="submit" class="btn btn-icon btn-sm btn-outline-danger waves-effect waves-float waves-light" style="white-space: nowrap"><i data-feather="trash-2"></i></button>
            '.csrf_field().'
        </form>      
      </div>';
    })
    ->make(true);
  }

  public function create()
  {
    return view('kontenweb.informasi.create');
  }

  public function store(Request $request)
  {
    try {
      // dd($request->all());
      $slug = Str::slug($request->judul);
      $cekjudul = WebBlog::where('slug',$slug)->count();
      if ($cekjudul > 0) {
        return back()->with('notif', json_encode([
          'title' => "KONTEN INFORMASI",
          'text' => "Judul $request->judul sudah terdaftar.",
          'type' => "warning"
        ]));
      }
      $cover = null;
      if ($request->file('covers') != null) {
        $namafile = $request->file('covers')->getClientOriginalName().'.'.$request->file('covers')->extension();
        $cover =  $request->file('covers')->storeAs('uploads/berita/'.$slug,$namafile);
      }
      $request->merge([
        'slug' => $slug,
        'cover' => $cover,
        'iduser' => Auth::user()->id
      ]);

      WebBlog::create($request->all());

      return redirect('kontenweb/informasi')->with('notif', json_encode([
        'title' => "KONTEN INFORMASI",
        'text' => "Berhasil menambah informasi baru.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "KONTEN INFORMASI",
        'text' => "Gagal menambah informasi, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function edit($id)
  {
    $data = WebBlog::with('jenis')->where('id',$id)->first();
    return view('kontenweb.informasi.edit', compact('data'));
  }

  public function update(Request $request)
  {
    try {
      $slug = Str::slug($request->judul);

      $cekjudul = WebBlog::where('slug',$slug)->where('id','!=',$request->id)->count();
      if ($cekjudul > 0) {
        return back()->with('notif', json_encode([
          'title' => "KONTEN INFORMASI",
          'text' => "Judul $request->judul sudah terdaftar.",
          'type' => "warning"
        ]));
      }

      $coverlama = WebBlog::where('id',$request->id)->pluck('cover')->first();
      if ($request->file('covers') != null) {
        Storage::delete($coverlama);
        $namafile = $request->file('covers')->getClientOriginalName().'.'.$request->file('covers')->extension();
        $cover =  $request->file('covers')->storeAs('uploads/berita/'.$slug,$namafile);
      }

      $request->merge([
        'slug' => $slug,
        'cover' => $cover,
        'iduser' => Auth::user()->id
      ]);

      WebBlog::where('id',$request->id)->update($request->except(['id','_token','covers']));

      // WebBlog::where('id',$request->id)->update([
      //   'nama' => $request->nama
      // ]);

      return redirect('kontenweb/informasi')->with('notif', json_encode([
        'title' => "KONTEN INFORMASI",
        'text' => "Berhasil mengubah informasi baru.",
        'type' => "success"
      ]));
    } catch (\Exception $e) {
      return back()->with('notif', json_encode([
        'title' => "KONTEN INFORMASI",
        'text' => "Gagal mengubah informasi, ".$e->getMessage(),
        'type' => "error"
      ]));
    }
  }

  public function delete(Request $request)
  {
    try {
        $coverlama = WebBlog::where('id',$request->id)->pluck('cover')->first();
        Storage::delete($coverlama);
        WebBlog::where('id', $request->id)->delete();
        return back()->with('notif', json_encode([
            'title' => "KONTEN INFORMASI",
            'text' => "Berhasil menghapus informasi",
            'type' => "success"
        ]));
    } catch (\Exception $e) {
        return back()->with('notif', json_encode([
            'title' => "KONTEN INFORMASI",
            'text' => "Gagal menghapus informasi, " . $e->getMessage(),
            'type' => "error"
        ]));
    }
  }

}
