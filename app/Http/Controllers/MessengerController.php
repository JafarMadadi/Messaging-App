<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class MessengerController extends Controller
{
  public function index(){
      return view('messenger.index');
  }
}
