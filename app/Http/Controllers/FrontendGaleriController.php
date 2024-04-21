<?php

namespace App\Http\Controllers;

use App\Helper;
use Notification;
use App\Models\WebGaleri;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class FrontendGaleriController extends Controller
{
  public function index()
  {
    $data = WebGaleri::where('tglpublish','<=',date('Y-m-d'))->orderby('tglpublish','desc')->get();
    return view('frontend.galeri', compact('data'));
  }

}
