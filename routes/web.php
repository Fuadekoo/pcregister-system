<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PcregisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('redirect',[HomeController::class,'redirect']);
route::get('index',[HomeController::class,'index']);
Route::get('/pcregisters/addpc', [pcregisterController::class, 'create'])->name('pcregisters.create');
Route::post('/pcregisters/showpc', [pcregisterController::class, 'store'])->name('pcregisters.store');
Route::get('/pcregisters', [pcregisterController::class, 'index'])->name('pcregisters.index');
route::get('/pcregisters/search',[pcregisterController::class,'search']);
Route::post('/pcregisters/search/', [PcregisterController::class, 'searchUser'])->name('pcregisters.searchUser');
Route::get('/delete/{id}', [PcregisterController::class, 'delete_pcregister'])->name('pcregisters.delete_pcregister');
Route::get('edit/{id}', [PcregisterController::class, 'edit_pcregister'])->name('pcregisters.edit_pcregister');
Route::post('edit/', [PcregisterController::class, 'update'])->name('pcregisters.update');
Route::get('download', [PcregisterController::class, 'download'])->name('download.file');
Route::get('/pcregister/searchbyqr', [PcregisterController::class, 'searchbyqr'])->name('pcregisters.searchbyqr');
Route::post('/pcregister/searchbyqr', [PcregisterController::class, 'qr_result'])->name('download.qr_result');
// Route::get('/download-qr-code', 'YourController@downloadQRCode')->name('downloadQRCode');
Route::get('download-qr-code', [PcregisterController::class, 'downloadQRCode'])->name('downloadQRCode');