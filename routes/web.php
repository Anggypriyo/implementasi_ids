<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Chome;
use App\Http\Controllers\Ccustomer;
use App\Http\Controllers\Cbarang;
use App\Http\Controllers\Cblank_page;
use App\Http\Controllers\Ctoko;
use App\Http\Controllers\Csse;
use App\Http\Controllers\Cscoreboard;

// use App\Http\Controllers\API\MobileController;
// use App\Http\Controllers\API\Movie0Controller;
// use App\Http\Controllers\API\Movie1Controller;
// use App\Http\Controllers\API\Movie2Controller;
// use App\Http\Controllers\API\M_pemesananController;

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
Route::get('/auth/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/callback', 'Auth\LoginController@handleProviderCallback');

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

Route::get('/home', [Cblank_page::class,'index']);
Route::get('/auth/redirect', [App\Http\Controllers\Auth\LoginController::class, 'redirectToProvider']);
Route::get('/auth/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleProviderCallback']);

Route::get('/sse', [Csse::class,'index']);
Route::get('/scoreboard',[Cscoreboard::class,'index']);
Route::get('/scoreboard-sse',[Cscoreboard::class,'sse']);
Route::get('/scoreboard-console',[Cscoreboard::class,'indexconsole']);
Route::post('/scoreboard-console/update-period',[Cscoreboard::class,'updatePeriod']);
Route::post('/scoreboard-console/reset-period',[Cscoreboard::class,'resetPeriod']);
Route::post('/scoreboard-console/update-home-name',[Cscoreboard::class,'updateHomeName']);
Route::post('/scoreboard-console/update-home-score',[Cscoreboard::class,'updateHomeScore']);
Route::post('/scoreboard-console/reset-home-score',[Cscoreboard::class,'resetHomeScore']);
Route::post('/scoreboard-console/update-home-foul',[Cscoreboard::class,'updateHomeFoul']);
Route::post('/scoreboard-console/reset-home-foul',[Cscoreboard::class,'resetHomeFoul']);
Route::post('/scoreboard-console/update-away-name',[Cscoreboard::class,'updateAwayName']);
Route::post('/scoreboard-console/update-away-score',[Cscoreboard::class,'updateAwayScore']);
Route::post('/scoreboard-console/reset-away-score',[Cscoreboard::class,'resetAwayScore']);
Route::post('/scoreboard-console/update-away-foul',[Cscoreboard::class,'updateAwayFoul']);
Route::post('/scoreboard-console/reset-away-foul',[Cscoreboard::class,'resetAwayFoul']);
Route::post('/scoreboard-console/update-home-status',[Cscoreboard::class,'updateHomeStatus']);
Route::post('/scoreboard-console/update-timer',[Cscoreboard::class,'updateTimer']);
Route::post('/update-menit-detik',[Cscoreboard::class,'update_menit_detik']);

// Route::resource('/api/mobiles',MobileController::class);
// Route::resource('/api/moviesnowplaying',Movie1Controller::class);
// Route::resource('/api/moviesbrowse',Movie0Controller::class);
// Route::resource('/api/moviescomingsoon',Movie2Controller::class);
// Route::resource('/api/m_pemesanan',M_pemesananController::class);

