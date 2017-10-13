<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use \App\Mail\mailTemp;


class TempController extends Controller
{
   public function index ($id)
   {
       
        Mail::to('jeremydanner2@gmail.com')->send(new mailTemp());    
        return;
   }
}
