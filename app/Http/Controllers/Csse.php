<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Csse extends Controller
{
    //
    public function index(){
        return view('sse');

    }

    public function datasse(){
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        $time = date('r');
        echo "data: The server time is: {$time}\n\n";
        flush();

    }

}
