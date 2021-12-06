<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chome;
use App\Http\Controllers\Ccustomer;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cblank_page;
use App\Http\Controllers\Ctoko;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Cblank_page::class,'index']);
Route::get('/home/index', [Cblank_page::class,'index']);

Route::get('/blank_page', [Cblank_page::class,'index']);

Route::get('/customer', [Ccustomer::class,'indexDataCust']);

Route::get('tambahCustomer/getcities/{id}',[Ccustomer::class,'getCities']);
Route::get('tambahCustomer/getdistricts/{id}',[Ccustomer::class,'getDistricts']);
Route::get('tambahCustomer/getsubdistricts/{id}',[Ccustomer::class,'getSubdistricts']);

Route::get('/tambahCustomer1', [Ccustomer::class,'tambahCustomer1']);
Route::get('/tambahCustomer2', [Ccustomer::class,'tambahCustomer2']);

Route::post('/tambahCustomer1/store1', [Ccustomer::class,'store1']);
Route::post('/tambahCustomer2/store2', [Ccustomer::class,'store2']);

Route::post('customer/export-excel',[Ccustomer::class,'importExcel']);


Route::get('/barang', [Cbarang::class,'index']);
Route::get('/tambahBarang', [Cbarang::class,'indexTambah']);
Route::post('/store', [Cbarang::class,'store']);
Route::get('/scan', [Cbarang::class,'indexScan']);
Route::post('/printBarcode', [Cbarang::class,'printPDF']);

Route::get('/toko', [Ctoko::class,'index']);
Route::post('/toko/store', [Ctoko::class,'store']);
Route::get('/toko/export/{id}', [Ctoko::class,'export']);
Route::get('/scan_toko', [Ctoko::class,'indexScan']);
Route::post('/scan_toko/getLocationToko',[Ctoko::class,'getLocationToko']);
Route::post('/scan_toko/hasil',[Ctoko::class,'getDistanceFromLatLonInKm']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/auth/redirect', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('/auth/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);