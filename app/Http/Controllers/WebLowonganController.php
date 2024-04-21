<?php

namespace App\Http\Controllers;

use App\Models\WebLowongan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WebLowonganController extends Controller
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
        $data = WebLowongan::orderby('id','desc')->get();
        return view('kontenweb.lowongan.index',compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $gambar = null;
            if ($request->file('gambar') != null) {
                $namafile = $request->file('gambar')->getClientOriginalName().'.'.$request->file('gambar')->extension();
                $gambar =  $request->file('gambar')->storeAs('uploads/lowongans',$namafile);
            }

            WebLowongan::create([
                'file' => $gambar,
                'iduser' => Auth::user()->id
            ]);

            return back()->with('notif', json_encode([
                'title' => "LOWONGAN MAGANG",
                'text' => "Berhasil menambah lowongan magang.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "LOWONGAN MAGANG",
                'text' => "Gagal menambah lowongan magang, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function delete(Request $request)
    {
        try {
            Storage::delete($request->file);
            WebLowongan::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "LOWONGAN MAGANG",
                'text' => "Berhasil menghapus lowongan magang.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "LOWONGAN MAGANG",
                'text' => "Gagal menghapus lowongan magang.".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
