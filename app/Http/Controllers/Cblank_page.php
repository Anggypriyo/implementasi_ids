<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Cblank_page extends Controller
{
    //
    public function index(){
        return view('blank_page');

    }
}
