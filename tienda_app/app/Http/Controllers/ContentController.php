<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getHome(){
        return view('home');
    }
}
