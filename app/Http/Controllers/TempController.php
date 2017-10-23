<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use \App\Mail\mailTemp;


class TempController extends Controller
{
    /**
    * @param int $id
    * @param string $email
    * @return null
    */
   public function index ($id, $email)
   {
        Mail::to($email)->send(new mailTemp());
        return;
   }
}
