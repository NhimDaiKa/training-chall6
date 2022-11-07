<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\ChallengeController;

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

//xử lý đăng nhập
Route::get('/', function(){
    return view('login');
})->name('formlogin');
Route::post('login', [UserController::class, 'login'])->name('login');
Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('logout', [UserController::class, 'logout'])->name('logout');

Route::get('profile', [UserController::class, 'profile'])->name('profile');
Route::patch('editprofile', [UserController::class, 'editprofile'])->name('editprofile');

Route::get('userlist', [UserController::class, 'userlist'])->name('userlist');
Route::get('otherprofile/{pid}', [UserController::class, 'otherprofile'])->name('otherprofile');

Route::get('createuserform', [UserController::class, 'createuserform'])->name('createuserform');
Route::post('createuser', [UserController::class, 'createuser'])->name('createuser');

Route::get('edituser/{pid}', [UserController::class, 'edituser'])->name('edituser');
Route::patch('edit/{pid}', [UserController::class, 'edit'])->name('edit');

Route::get('deleteuser/{pid}', [UserController::class, 'deleteuser'])->name('deleteuser');
Route::delete('delete/{pid}', [UserController::class, 'delete'])->name('delete');

Route::get('chatbox/{pid}', [ChatController::class, 'chatbox'])->name('chatbox');
Route::get('editchat/{pid}/{mid}', [ChatController::class, 'editchat'])->name('editchat');
Route::get('deleteid/{pid}/{mid}', [ChatController::class, 'deleteid'])->name('deleteid');
Route::delete('deletemess/{pid}/{mid}', [ChatController::class, 'deletemess'])->name('deletemess');
Route::patch('editmess/{pid}/{mid}', [ChatController::class, 'editmess'])->name('editmess');
Route::post('sendmess/{pid}', [ChatController::class, 'sendmess'])->name('sendmess');

Route::get('createhomeworkform', [HomeworkController::class, 'createhomeworkform'])->name('createhomeworkform');
Route::post('createhomework', [HomeworkController::class, 'createhomework'])->name('createhomework');
Route::get('downhomework/{hid}', [HomeworkController::class, 'downhomework'])->name('downhomework');

Route::post('turnin/{prjid}', [HomeworkController::class, 'turnin'])->name('turnin');
Route::get('downanswer/{hid}', [HomeworkController::class, 'downanswer'])->name('downanswer');

Route::get('createchallform', [ChallengeController::class,'createchallform'])->name('createchallform');
Route::post('createchall', [ChallengeController::class,'createchall'])->name('createchall');

Route::post('answer/{cid}', [ChallengeController::class, 'answer'])->name('answer');