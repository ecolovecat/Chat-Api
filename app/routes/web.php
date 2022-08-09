<?php

use App\Http\Controllers\GroupChatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;










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

//Route::get('/', function () {
//    return view('welcome');
//})->middleware('auth');
//
//
////login
//Route::get('api/auth/login', function() {
//    return view('login.login');
//})->name('login');
//Route::post('/api/auth/login/store', [LoginController::class, "login"])->name("checkLogin");
//
////logout
//Route::get('api/auth/register', function() {
//    return view('login.register');
//});
//Route::post('/api/auth/register/store', [\App\Http\Controllers\RegisterController::class, "createUser"]);
//
//Route::group(['prefix'=>'api/chat', 'as'=>'api.chat.'],function() {
//   Route::get("/get_conversations", [GroupChatController::class, 'getConversationUser']);
//    Route::get("/create_messages/{id}", [GroupChatController::class, 'createMessage']);
//    Route::get("/get_messages/{id}", [GroupChatController::class, 'getMessages']);
//    Route::get("/join_conversation/{id}", [GroupChatController::class, 'joinConversation']);
//
//
//});
//
//Route::get('success-login', function () {
//    echo "ok";
//})->name("success-login");
//
//Route::get('logout', function() {
//    Auth::logout();
//});
//
//Route::get('add-list/{gid}', function($gid) {
//    return view("list_add")->with('gid', $gid);
//});
//
//Route::post('add_to_conversation', [GroupChatController::class, 'addListUser'])->name('add-list');
//


//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
