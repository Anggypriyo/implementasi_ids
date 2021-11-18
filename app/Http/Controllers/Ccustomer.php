<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\ec_subdistricts;
use App\Models\ec_districts;
use App\Models\ec_cities;
use App\Models\ec_provinces;
use App\Models\customer;

class Ccustomer extends Controller
{
    public function indexDataCust(){
        //mengambil data dari tabel customer
        // $customer = DB::table('customer')->paginate(10);
        $customer = customer::paginate(10);
        $ec_subdistricts = ec_subdistricts::all();
        $ec_districts = ec_districts::all();
        $ec_cities = ec_cities::all();
        $ec_provinces = ec_provinces::all();
        //mengirim data ke view table
        return view('customer',
        compact('customer'),
        compact('ec_subdistricts'),
        compact('ec_districts'),
        compact('ec_cities'),
        compact('ec_provinces'));
    }

    public function tambahCustomer1()
	{
		$ec_provinces = DB::table('ec_provinces')->pluck("prov_name","prov_id");
		return view('tambahCustomer1',compact('ec_provinces'));
	}

    public function tambahCustomer2()
	{
		$ec_provinces = DB::table('ec_provinces')->pluck("prov_name","prov_id");
		return view('tambahCustomer2',compact('ec_provinces'));
	}

    public function getCities($id) 
    {        
        $ec_cities = DB::table("ec_cities")->where("prov_id",$id)->pluck("city_name","city_id");
        return json_encode($ec_cities);
    }
    public function getDistricts($id) 
    {        
        $ec_districts = DB::table("ec_districts")->where("city_id",$id)->pluck("dis_name","dis_id");
        return json_encode($ec_districts);
    }
    public function getSubdistricts($id) 
    {        
        $ec_subdistricts = DB::table("ec_subdistricts")->where("dis_id",$id)->pluck("subdis_name","subdis_id");
        return json_encode($ec_subdistricts);
    }

    public function store1(Request $request)
    {
	// insert data ke table
	DB::table('customer')->insert([
		'nama' => $request->nama,
		'alamat' => $request->alamat,
		'id_kel' => $request->ec_subdistricts,
        'foto' => $request->image
	]);
	// alihkan halaman ke halaman
	return redirect('/tambahCustomer1')->with('status','Data Berhasil Ditambahkan!!!');
 
    }
    public function store2(Request $request)
    {
	// insert data ke table
	$this->validate($request,[
        'nama' => 'required',
    ]);

    $image = str_replace('data:image/png;base64,', '', $request->image);
    $image = str_replace(' ', '+', $image);
    // $imageName = str_random(10) . '.png';
    $imageName = $request->nama.time(). '.png';

    Storage::disk('local')->put($imageName, base64_decode($image));

    DB::table('customer')->insert([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        // 'foto'  => $imageName,
        'file_path' => $imageName,
        'id_kel' => $request->ec_subdistricts
    ]);
	// alihkan halaman ke halaman
	return redirect('/tambahCustomer2')->with('status','Data Berhasil Ditambahkan!!!');
    
    }

}
