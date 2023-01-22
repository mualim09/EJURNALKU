<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DatadudiController;
use App\Http\Controllers\DatasiswaController;
use App\Http\Controllers\SiswamagangController;
use App\Http\Controllers\TambahjurnalController;
use App\Http\Controllers\DataplotinganController;
use App\Http\Controllers\DatapersyaratanController;
use App\Http\Controllers\DatagurupembimbingController;
use App\Http\Controllers\DatapembimbingdudiController;
use App\Models\jurusan;
use App\Models\datasiswa;
use App\Models\datadudi;
use App\Models\tambahjurnal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. hw_New_Document(object_record, document_data, document_size)ow create something great!
|
*/

Route::get('/', function () {
	$jurusan = jurusan::count();
	$siswa = datasiswa::count();
	$dudi = datadudi::count();
	$jurnal = tambahjurnal::count();

    return view('welcome', compact('jurusan','siswa','dudi','jurnal'));
})->middleware('auth');

//landing
Route::get('/landinghome', function () {
    return view('landing.home');
});

//jurusan
Route::get('/datajurusan',[JurusanController::class, 'index'])->name('datajurusan');
Route::get('/tambahjurusan',[JurusanController::class, 'tambahjurusan'])->name('tambahjurusan');
Route::post('/insertjurusan',[JurusanController::class, 'insertjurusan'])->name('insertjurusan');
Route::get('/tampiljurusan/{id}',[JurusanController::class, 'tampiljurusan'])->name('tampilajurusan');
Route::post('/updatedatajurusan/{id}',[JurusanController::class, 'updatedatajurusan'])->name('updatedatajurusan');
Route::get('/deletejurusan/{id}',[JurusanController::class, 'deletejurusan'])->name('deletejurusan');

//datadudi
Route::get('/datadudi',[DatadudiController::class, 'index'])->name('datadudi');
Route::get('/tambahdatadudi',[DatadudiController::class, 'tambahdatadudi'])->name('tambahdatadudi');
Route::post('/insertdatadudi',[DatadudiController::class, 'insertdatadudi'])->name('insertdatadudi');
Route::get('/tampildatadudi/{id}',[DatadudiController::class, 'tampildatadudi'])->name('tampildatadudi');
Route::post('/updatedatadudi/{id}',[DatadudiController::class, 'updatedatadudi'])->name('updatedatadudi');
Route::get('/deletedatadudi/{id}',[DatadudiController::class, 'deletedatadudi'])->name('deletedatadudi');

//datasiswa
Route::get('/datasiswa',[DatasiswaController::class, 'index'])->name('datasiswa');
Route::get('/tambahdatasiswa',[DatasiswaController::class, 'tambahdatasiswa'])->name('tambahdatasiswa');
Route::post('/insertdatasiswa',[DatasiswaController::class, 'insertdatasiswa'])->name('insertdatasiswa');
Route::get('/tampildatasiswa/{id}',[DatasiswaController::class, 'tampildatasiswa'])->name('tampildatasiswa');
Route::post('/updatedatasiswa/{id}',[DatasiswaController::class, 'updatedatasiswa'])->name('updatedatasiswa');
Route::get('/deletedatasiswa/{id}',[DatasiswaController::class, 'deletedatasiswa'])->name('deletedatasiswa');

//datatambahjurnal
Route::get('/datatambahjurnal',[TambahjurnalController::class, 'index'])->name('datatambahjurnal');
Route::get('/tambahtambahjurnal',[TambahjurnalController::class, 'tambahtambahjurnal'])->name('tambahtambahjurnal');
Route::post('/inserttambahjurnal',[TambahjurnalController::class, 'inserttambahjurnal'])->name('inserttambahjurnal');
Route::get('/tampiltambahjurnal/{id}',[TambahjurnalController::class, 'tampiltambahjurnal'])->name('tampiltambahjurnal');
Route::post('/updatetambahjurnal/{id}',[TambahjurnalController::class, 'updatetambahjurnal'])->name('updatetambahjurnal');
Route::get('/deletetambahjurnal/{id}',[TambahjurnalController::class, 'deletetambahjurnal'])->name('deletetambahjurnal');

//datapersyaratan
Route::get('/datapersyaratan',[DatapersyaratanController::class, 'index'])->name('datapersyaratan');
Route::get('/tambahpersyaratan',[DatapersyaratanController::class, 'tambahpersyaratan'])->name('tambahpersyaratan');
Route::post('/insertpersyaratan',[DatapersyaratanController::class, 'insertpersyaratan'])->name('insertpersyaratan');
Route::get('/tampilpersyaratan/{id}',[DatapersyaratanController::class, 'tampilpersyaratan'])->name('tampilpersyaratan');
Route::post('/updatepersyaratan/{id}',[DatapersyaratanController::class, 'updatepersyaratan'])->name('updatepersyaratan');
Route::get('/deletepersyaratan/{id}',[DatapersyaratanController::class, 'deletepersyaratan'])->name('deletepersyaratan');

//datagurupembimbing
Route::get('/datagurupembimbing',[DatagurupembimbingController::class, 'index'])->name('datagurupembimbing');
Route::get('/tambahgurupembimbing',[DatagurupembimbingController::class, 'tambahgurupembimbing'])->name('tambahgurupembimbing');
Route::post('/insertgurupembimbing',[DatagurupembimbingController::class, 'insertgurupembimbing'])->name('insertgurupembimbing');
Route::get('/tampilgurupembimbing/{id}',[DatagurupembimbingController::class, 'tampilgurupembimbing'])->name('tampilgurupembimbing');
Route::post('/updategurupembimbing/{id}',[DatagurupembimbingController::class, 'updategurupembimbing'])->name('updategurupembimbing');
Route::get('/deletegurupembimbing/{id}',[DatagurupembimbingController::class, 'deletegurupembimbing'])->name('deletegurupembimbing');

//pembimbingdudi
Route::get('/pembimbingdudi',[DatapembimbingdudiController::class, 'index'])->name('pembimbingdudi');
Route::get('/tambahpembimbingdudi',[DatapembimbingdudiController::class, 'tambahpembimbingdudi'])->name('tambahpembimbingdudi');
Route::post('/insertpembimbingdudi',[DatapembimbingdudiController::class, 'insertpembimbingdudi'])->name('insertpembimbingdudi');
Route::get('/tampilpembimbingdudi/{id}',[DatapembimbingdudiController::class, 'tampilpembimbingdudi'])->name('tampilpembimbingdudi');
Route::post('/updatepembimbingdudi/{id}',[DatapembimbingdudiController::class, 'updatepembimbingdudi'])->name('updatepembimbingdudi');
Route::get('/deletepembimbingdudi/{id}',[DatapembimbingdudiController::class, 'deletepembimbingdudi'])->name('deletepembimbingdudi');

//dataplotingan
Route::get('/dataplotingan',[DataplotinganController::class, 'index'])->name('dataplotingan');
Route::get('/tambahdataplotingan',[DataplotinganController::class, 'tambahdataplotingan'])->name('tambahdataplotingan');
Route::post('/insertdataplotingan',[DataplotinganController::class, 'insertdataplotingan'])->name('insertdataplotingan');
Route::get('/tampildataplotingan/{id}',[DataplotinganController::class, 'tampildataplotingan'])->name('tampildataplotingan');
Route::post('/updatedataplotingan/{id}',[DataplotinganController::class, 'updatedataplotingan'])->name('updatedataplotingan');
Route::get('/deletedataplotingan/{id}',[DataplotinganController::class, 'deletedataplotingan'])->name('deletedataplotingan');

//siswamagang
Route::get('/siswamagang',[SiswamagangController::class, 'siswamagang'])->name('siswamagang');
Route::get('/tambahsiswamagang',[SiswamagangController::class, 'tambahsiswamagang'])->name('tambahsiswamagang');
Route::post('/insertsiswamagang',[SiswamagangController::class, 'insertsiswamagang'])->name('insertsiswamagang');
Route::get('/tampilsiswamagang/{id}',[SiswamagangController::class, 'tampilsiswamagang'])->name('tampilsiswamagang');
Route::post('/updatesiswamagang/{id}',[SiswamagangController::class, 'updatesiswamagang'])->name('updatesiswamagang');
Route::get('/deletesiswamagang/{id}',[SiswamagangController::class, 'deletesiswamagang'])->name('deletesiswamagang');

//loginadmin
Route::get('/login',[LoginController::class, 'login'])->name('login');
Route::post('/loginproses',[LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register',[LoginController::class, 'register'])->name('register');
Route::post('/registeruser',[LoginController::class, 'registeruser'])->name('registeruser');

//loginsiswa
Route::get('/loginsiswa',[LoginController::class, 'loginsiswa'])->name('loginsiswa');
Route::post('/loginprosessiswa',[LoginController::class, 'loginprosessiswa'])->name('loginprosessiswa');
Route::get('/registersiswa',[LoginController::class, 'registersiswa'])->name('registersiswa');
Route::post('/registerusersiswa',[LoginController::class, 'registerusersiswa'])->name('registerusersiswa');

//loginmagang
Route::get('/loginmagang',[LoginController::class, 'loginmagang'])->name('loginmagang');
Route::post('/loginprosesmagang',[LoginController::class, 'loginprosesmagang'])->name('loginprosesmagang');
Route::get('/registermagang',[LoginController::class, 'registermagang'])->name('registermagang');
Route::post('/registerusermagang',[LoginController::class, 'registerusermagang'])->name('registerusermagang');

//log out
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');


//datapersyaratan
Route::get('/datapersyaratan',[DatapersyaratanController::class, 'index'])->name('datapersyaratan');
Route::get('/tambahdatapersyaratan',[DatapersyaratanController::class, 'tambahdatapersyaratan'])->name('tambahdatapersyaratan');
Route::post('/insertdatapersyaratan',[DatapersyaratanController::class, 'insertdatapersyaratan'])->name('insertdatapersyaratan');
Route::get('/tampildatapersyaratan/{id}',[DatapersyaratanController::class, 'tampildatapersyaratan'])->name('tampildatapersyaratan');
Route::post('/updatedatapersyaratan/{id}',[DatapersyaratanController::class, 'updatedatapersyaratan'])->name('updatedatapersyaratan');
Route::get('/deletedatapersyaratan/{id}',[DatapersyaratanController::class, 'deletedatapersyaratan'])->name('deletedatapersyaratan');

//profil
Route::get('/profil', [LoginController::class, 'profil'])->name('profil');
Route::get('/editprofil', [LoginController::class, 'editprofil'])->name('editprofil');
Route::post('/updateprofil', [LoginController::class, 'updateprofil'])->name('updateprofil');



