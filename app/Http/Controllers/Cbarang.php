<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\barang;
use PDF;

class Cbarang extends Controller
{
    public function index(){
        $barang = barang::paginate(10);
        return view('barang',
        compact('barang'));
    }


    public function indexScan(){
        return view('scan');
    }
    public function indexTambah(){
        return view('tambahBarang');
    }
    public function store(Request $request)
    {
        $request->validate([
           
            'nama' => 'required||max:50',
        ]);
        Barang::create([
            'nama' => $request->nama
        ]);
        return redirect('/barang')->with('status','Data Berhasil Ditambahkan!!!'); 
    }

    public function printPDF(Request $request) {
        $data = Barang::all();
        $baris = $request->baris_barang;
        $kolom = $request->kolom_barang;
        $long = count($data);
        $long =intval($long/5);
        $long++;
        $pdf = PDF::loadView('printBarcode', compact('data','long','baris','kolom'));
    
        return $pdf->stream('Barcode.pdf');
       //return view('printBarcode', compact('data','long','baris','kolom'));
     }

}
