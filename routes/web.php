<?php
use App\Http\Controllers\AjaxController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;


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



Route::get('/', function () {return view('welcome');});
Route::get('/form',function() {return view('form');});
Route::get('/getdata', [App\Http\Controllers\dataController::class, 'dataget'])->name('getdata');
Route::get('/insertdata', [App\Http\Controllers\dataController::class, 'insertPage'])->name('insertdata');
Route::post('/usersignup', [App\Http\Controllers\dataController::class, 'usersignup'])->name('usersignup');
Route::get('/edit-record/{id}', [App\Http\Controllers\dataController::class, 'edit'])->name('edit-record');
Route::get('/delete-record/{id}', [App\Http\Controllers\dataController::class, 'delete'])->name('delete-record');
Route::post('/update/{id}', [App\Http\Controllers\dataController::class, 'updateRequest'])->name('update');
Route::get('/loginpage', [App\Http\Controllers\dataController::class, 'loginpage'])->name('loginpage');
Route::post('/userlogin', [App\Http\Controllers\dataController::class, 'userlogin'])->name('userlogin');
Route::get('/userpage', [App\Http\Controllers\dataController::class, 'user'])->name('userpage');
// Route::get('/logout', [App\Http\Controllers\dataController::class, 'logout'])->name('logout');
Route::get('/admin', [App\Http\Controllers\dataController::class, 'admin'])->name('admin');
Route::post('/adminsignup', [App\Http\Controllers\dataController::class, 'adminsignup'])->name('adminsignup');
Route::get('/adminloginpage', [App\Http\Controllers\dataController::class, 'adminloginpage'])->name('adminloginpage');
Route::post('/adminlogin', [App\Http\Controllers\dataController::class, 'adminlogin'])->name('adminlogin');
Route::get('/changepasswordpage', [App\Http\Controllers\dataController::class, 'changepasswordpage']);
Route::post('/changepassword', [App\Http\Controllers\dataController::class, 'changepassword']);
Route::post('/edit-profile/{pass}', [App\Http\Controllers\dataController::class, 'editprofile'])->name('edit-profile');
Route::post('/status/{id}', [App\Http\Controllers\dataController::class, 'status'])->name('status');
Route::get('/personalpage',[App\Http\Controllers\dataController::class,'personaldetails'])->name('personalpage');
Route::get('/forgetpasswordpage',[App\Http\Controllers\dataController::class,'forgetpasswordpage'])->name('forgetpasswordpage');
Route::post('/forgetpassword',[App\Http\Controllers\dataController::class,'forgetpassword'])->name('forgetpassword');
Route::get('/trait',[App\Http\Controllers\dataController::class,'trait'])->name('trait');
Route::get('/helper',[App\Http\Controllers\dataController::class,'helper'])->name('helper');
Route::get('/mail',[App\Http\Controllers\MailController::class,'sendmail'])->name('mail');
Route::get('/database',[App\Http\Controllers\dataController::class,'database'])->name('database');
Route::get('email-test', function(){
    $details['email'] = 'yash.bhambhani02@gmail.com';
    dispatch(new App\Jobs\MyJob($details));
    dd("done");
});
// Route::post('loginjwt',[App\Http\Controllers\dataController::class,'loginjwt'])->name('loginjwt');
Route::get('/importfromexcel',[App\Http\Controllers\dataController::class,'importfromexcel'])->name('importfromexcel');
Route::post('/excel',[App\Http\Controllers\excelController::class,'excel'])->name('excel');


//ajax routes begin below - 


Route::post('/ajaxform',[App\Http\Controllers\AjaxController::class,'ajaxform'])->name('ajaxform');
Route::get('/datashow',[App\Http\Controllers\AjaxController::class,'showdata'])->name('datashow');
Route::get('/datafetch',[App\Http\Controllers\AjaxController::class,'fetchdata'])->name('datafetch');
Route::get('/updateajax/{ed}',[App\Http\Controllers\AjaxController::class,'updateajax'])->name('updateajax');
Route::post('/editajax',[App\Http\Controllers\AjaxController::class,'ajaxedit'])->name('editajax');Route::post('/editajax',[App\Http\Controllers\AjaxController::class,'ajaxedit'])->name('editajax');
Route::get('/search',[App\Http\Controllers\AjaxController::class,'search'])->name('search');
Route::get('/search2',[App\Http\Controllers\AjaxController::class,'search2'])->name('search2');
Route::get('/recordpage',[App\Http\Controllers\AjaxController::class,'recordpage'])->name('recordpage');
Route::get('/pagedata1',[App\Http\Controllers\AjaxController::class,'pagedata1'])->name('pagedata1');
Route::get('/pagedata2',[App\Http\Controllers\AjaxController::class,'pagedata2'])->name('pagedata2');
Route::get('/pagedata3',[App\Http\Controllers\AjaxController::class,'pagedata3'])->name('pagedata3');
Route::get('/invoke',[App\Http\Controllers\BotManChatController::class,'invoke'])->name('invoke');
Route::get('/chatbot',[App\Http\Controllers\BotManChatController::class,'chatbot'])->name('chatbot');
Route::get('/alpha', function () {
    return view('alpha');
});


Route::get('/mailsend', function(){
  
    dispatch(new App\Jobs\SendEmailJob());

});
