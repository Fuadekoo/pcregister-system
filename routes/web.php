<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PcregisterController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\Excelcontroller;


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

// Authenticated routes with session timeout and verification
Route::middleware([
    'auth',
    'throttle:100,30',
    'web',
    'verified',
    'usertype:0'
    

])->group(function () {


Route::get('/pcregisters/addpc', [pcregisterController::class, 'create'])->name('pcregisters.create');
Route::post('/pcregisters/showpc', [pcregisterController::class, 'store'])->name('pcregisters.store');
Route::get('/pcregisters', [pcregisterController::class, 'index'])->name('pcregisters.index');
route::get('/pcregisters/search',[pcregisterController::class,'search']);
Route::post('/pcregisters/search/', [PcregisterController::class, 'searchUser'])->name('pcregisters.searchUser');

Route::post('/pcregisters/search-update', [PcregisterController::class, 'searchUpdate'])->name('pcregisters.searchUpdate');

Route::get('/delete/{id}', [PcregisterController::class, 'delete_pcregister'])->name('pcregisters.delete_pcregister');
Route::get('edit/{id}', [PcregisterController::class, 'edit_pcregister'])->name('pcregisters.edit_pcregister');
Route::post('edit/', [PcregisterController::class, 'update'])->name('pcregisters.update');
Route::get('download', [PcregisterController::class, 'download'])->name('download.file');
// Route::get('/pcregister/searchbyqr', [PcregisterController::class, 'searchbyqr'])->name('pcregisters.searchbyqr');
// Route::post('/pcregister/searchbyqr', [PcregisterController::class, 'qr_result'])->name('download.qr_result');
// Route::get('/download-qr-code', 'YourController@downloadQRCode')->name('downloadQRCode');
Route::get('download-qr-code', [PcregisterController::class, 'downloadQRCode'])->name('downloadQRCode');

Route::get('/pcregister/searchbyqr', [PcregisterController::class, 'searchbyqr'])->name('pcregisters.searchbyqr');

Route::post('/pcregister/searchbyqr', [PcregisterController::class, 'qr_result'])->name('download.qr_result');
Route::get('/alldownload', [PcregisterController::class, 'alldownload'])->name('alldownload');

});


Route::middleware(['auth', 'web','usertype:1'])->group(function () {
    Route::get('/component', [adminController::class, 'component'])->name('component');
    Route::get('/securitylist', [adminController::class, 'showsecurity'])->name('showsecurity');
    Route::get('/pclist', [adminController::class, 'showpc'])->name('showpc');

    Route::get('/permission', [adminController::class, 'permission'])->name('home.permisson');
    Route::post('/admin/update', [adminController::class, 'update'])->name('admin.update');




    Route::get('/export', [Excelcontroller::class, 'export'])->name('export');
    Route::post('/import', [Excelcontroller::class, 'import'])->name('import');
    Route::get('/register', [adminController::class, 'allregister'])->name('register');
    Route::get('/about', [adminController::class, 'about'])->name('about.admin');

    });
    Route::middleware(['auth', 'web','usertype:2'])->group(function () {
        
        });