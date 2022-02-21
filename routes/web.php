<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});


// Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
//     Auth::routes();
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('setting', [AdminController::class, 'setting'])->name('admin.setting');


    Route::post('update-profile-info', [AdminController::class, 'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture', [AdminController::class, 'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password', [AdminController::class, 'changePassword'])->name('adminChangePassword');

    Route::get('adminindex', [AdminController::class, 'adminHome']);
    Route::get('create_user', [AdminController::class, 'createuser']);
    Route::post('add_user', [AdminController::class, 'adduser']);
    Route::get('edit_user/{id}', [AdminController::class, 'edit']);
    Route::post('edited_user/{id}', [AdminController::class, 'editeduser']);
    Route::get('delete_user/{id}', [AdminController::class, 'delete']);
    Route::get('view_user/{id}', [AdminController::class, 'view']);
});


Route::group(['prefix' => 'company', 'middleware' => ['isCompany', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [CompanyController::class, 'index'])->name('company.dashboard');
    Route::get('profile', [CompanyController::class, 'profile'])->name('company.profile');
    Route::get('setting', [CompanyController::class, 'setting'])->name('company.setting');

    //company
    Route::get('/index', [CompanyController::class, 'index']);
    Route::get('/new_cus', [CompanyController::class, 'addcustomer']);
    Route::post('/register', [CompanyController::class, 'storePhoneNumber']);
   
    //edit
    Route::get('edit_cus/{id}', [CompanyController::class, 'editcustomer']);
    Route::post('edited_customer/{id}', [CompanyController::class, 'editedcustomer']);
    //delete
    Route::get('delete_cus/{id}', [CompanyController::class, 'deletecustomer']);

    //sending sms using twilio
    Route::get('send_message/{id}', [CompanyController::class, 'sendsms']);
    Route::post('/send_notification/{id}', [CompanyController::class, 'sendnotification']);
});



// Route::get('/index',[CompanyController::class,'index'])->name('company.index');
// Route::get('/index',[CompanyController::class,'index']);
// Route::get('/new_cus',[CompanyController::class,'addcustomer']);
// Route::post('/register', [CompanyController::class,'storePhoneNumber']);
// Route::post('/send_notification/{id}', [CompanyController::class,'sendnotification']);
// //edit
// Route::get('edit_cus/{id}',[CompanyController::class,'editcustomer']);
// Route::post('edited_cus/{id}', [CompanyController::class, 'editedcustomer']);
// //delete
// Route::get('delete_cus/{id}', [CompanyController::class, 'deletecustomer']);




//admin section
// Route::get('adminindex', [AdminController::class, 'adminHome']);
// Route::get('create_user', [AdminController::class, 'createuser']);
// Route::post('add_user', [AdminController::class, 'adduser']);
// Route::get('edit_user/{id}', [AdminController::class, 'edit']);
// Route::post('edited_user/{id}', [AdminController::class, 'editeduser']);
// Route::get('delete_user/{id}', [AdminController::class, 'delete']);
// Route::get('view_user/{id}', [AdminController::class, 'view']);


//sms
Route::get('/bulk_sms', [CompanyController::class, 'bulksms']);
Route::post('/custom', [CompanyController::class, 'sendCustomMessage']);

Route::post('/bulk_mess', [CompanyController::class, 'sendbulksms']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
