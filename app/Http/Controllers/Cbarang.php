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
        $hasil = explode(",", $request->barang);
        $barang = barang::whereIn('id_barang', $hasil)->get();
        $baris = $request->baris;
        $kolom = $request->kolom;
        //dd($barang);
        $pdf = PDF::loadView('printBarcode', compact('barang','baris','kolom'));
        //$hasil = barang::whereIn('id_barang', $barang)->get();
        //dd($hasil);
        return $pdf->stream('Barcode.pdf');
        
        /*return view('printBarcode',[
            'barang' => barang::whereIn('id_barang', $barang)->get(),
            'baris' => $request->baris,
            'kolom' => $request->kolom,
        ]);*/
     }

}
