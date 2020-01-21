<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{

    
    public function __contruct()
    {
        $this->middleware('guest');
    }

    public function error()
    {
        return view ('error.404');
    }

    public function goback()
    {
        return view('welcome');
    }
}
