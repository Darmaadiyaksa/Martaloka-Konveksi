<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helper;
use Notification;
use App\Notifications\DaftarSuccess;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class FrontendProgramController extends Controller
{
  public function index()
  {
    return view('frontend.program');
  }

}
