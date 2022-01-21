<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;



class C_upload extends Controller
{
    function index(){
        return view('movies');
    }

    function proses_upload(Request $request)
    {
        // print_r($request->input());
        // echo '<br><br>';
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $file->move('image',$fileName);
        $arrInsert = array(
            'nama' => $request->input('nama'),
            'sutradara' => $request->input('sutradara'),
            'produksi' => $request->input('produksi'),
            'sinopsis' => $request->input('sinopsis'),
            'file_name' => $fileName,
            'status' => $request->input('status')
        );
        DB::table('movies')->insert($arrInsert);
        return redirect()->back()->with('success', 'upload Berhasil');
    }
    

}
