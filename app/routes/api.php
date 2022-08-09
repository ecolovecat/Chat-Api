<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupChatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');


//login
Route::get('/auth/login', function() {
    return view('login.login');
})->name('login');
Route::post('/auth/login/store', [LoginController::class, "login"])->name("checkLogin");
Route::get('success-login', function () {
    echo "ok";
})->name("success-login");
//logout
Route::get('/auth/register', function() {
    return view('login.register');
});
Route::get('logout', function() {
    Auth::logout();
});

// register

Route::post('/auth/register/store', [\App\Http\Controllers\RegisterController::class, "createUser"]);


// chat
Route::group(['prefix'=>'/chat', 'as'=>'api.chat.'],function() {
    Route::get("/get_conversations", [GroupChatController::class, 'getConversationUser']);
    Route::get("/create_messages/{id}", [GroupChatController::class, 'createMessage']);
    Route::get("/get_messages/{id}", [GroupChatController::class, 'getMessages']);
    Route::get("/join_conversation/{id}", [GroupChatController::class, 'joinConversation']);
    Route::get("/get_conversation_data/{gid}", [GroupChatController::class, 'getConversationData']);
    Route::get("/delete_conversation/{gid}", [GroupChatController::class, "deleteConversation"]);


});


// add list user
Route::get('add-list/{gid}', function($gid) {
    return view("list_add")->with('gid', $gid);
});

Route::post('add_to_conversation', [GroupChatController::class, 'addListUser'])->name('add-list');

// leave conversation
Route::get('leave/{gid}', [GroupChatController::class, 'leaveConversation']);

//remove list user
Route::get('remove-list/{gid}', function($gid) {
    return view("list_remove")->with('gid', $gid);
});

Route::post('remove_from_conversation', [GroupChatController::class, 'removeListUser'])->name('remove-list');

// user

Route::group(['prefix'=>'/user', 'as'=>'api.user.'],function() {
    Route::get('/search_by_name/{name}', [UserController::class, "searchByName"]);
    Route::get('/change_user_name', function() {
        return view("change_user");
    });
    Route::post('/change_user_name_post', [UserController::class, "changeUserName"])->name('change-user-name');

});

// change conversation name

Route::get("/change_conversation_name/{gid}", function($gid) {
    return view("change_name")->with('gid', $gid);
});
Route::post("/change_conversation_post", [GroupChatController::class,'changeConName'])->name('change_conversation_name');
