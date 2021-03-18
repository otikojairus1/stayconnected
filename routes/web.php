<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\searchController;
use App\Http\Controllers\eventsController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\postsController;
use App\Http\Controllers\competitionController;
use App\Http\Controllers\competitionRecordController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\authsController;
use App\Http\Controllers\awardsController;
use App\Http\Controllers\groupController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::post('/eventcreate', [eventsController::class, 'store'])->middleware(['auth']);
Route::post('/searchhandler', [searchController::class, 'search'])->middleware(['auth']);
Route::get('/profile/{lastname}', [searchController::class, 'profile'])->middleware(['auth']);
Route::get('/events', [eventsController::class, 'status'])->middleware(['auth']);
Route::get('/customer', [customerController::class, 'chat']);
Route::post('/customerquery', [customerController::class, 'store']);
Route::get('/customerservice', [customerController::class, 'index'])->middleware(['auth']);
Route::get('/section/events', [customerController::class, 'events'])->middleware(['auth']);
Route::get('/section/queries', [customerController::class, 'queries'])->middleware(['auth']);
Route::get('/posts', [postsController::class, 'index'])->middleware(['auth']);
Route::post('/posts', [postsController::class, 'store'])->middleware(['auth']);
Route::get('/create/posts', [postsController::class, 'create'])->middleware(['auth']);
Route::get('/competitions', [competitionController::class, 'home'])->middleware(['auth']);
Route::post('/posts/delete/{id}', [postsController::class, 'destroy'])->middleware(['auth']);
Route::post('/competitionsave', [competitionController::class, 'store'])->middleware(['auth']);
Route::get('/compete', [competitionController::class, 'compete'])->middleware(['auth']);
Route::post('/user/join', [competitionRecordController::class, 'store'])->middleware(['auth']);
Route::get('/view/competitions/{id}', [competitionRecordController::class, 'index'])->middleware(['auth']);
Route::get('/competition/personal/{id}', [competitionRecordController::class, 'destroy'])->middleware(['auth']);
Route::post('/competition/delete/{id}', [competitionController::class, 'destroy'])->middleware(['auth']);
Route::get('/reply/{email}', [competitionController::class, 'reply'])->middleware(['auth']);
Route::post('/send/reply', [competitionController::class, 'sendReply'])->middleware(['auth']);
Route::get('/inbox', [ReplyController::class, 'index'])->middleware(['auth'])->middleware(['auth']);
Route::get('/owners/login', [authsController::class, 'showownersform']);
Route::get('/students/login', [authsController::class, 'showstudentsform']);
Route::get('/companyreps/login', [authsController::class, 'showcompanyform']);
Route::post('/owners/login', [authsController::class, 'authenticateOwners']);
Route::post('/students/login', [authsController::class, 'authenticateStudents']);
Route::post('/companyreps/login', [authsController::class, 'authenticateCompanyReps']);
Route::get('/awards', [awardsController::class, 'index'])->middleware(['auth']);
Route::post('/award/competitors', [awardsController::class, 'create'])->middleware(['auth']);
Route::post('/award/user', [awardsController::class, 'award'])->middleware(['auth']);
Route::get('/winners', [awardsController::class, 'winners'])->middleware(['auth']);
Route::get('/invite/meeting', [awardsController::class, 'invite'])->middleware(['auth']);
Route::post('/send/invite', [awardsController::class, 'sendinvite'])->middleware(['auth']);
Route::get('/manage/users', [awardsController::class, 'users'])->middleware(['auth']);
Route::post('/users/delete/{id}', [awardsController::class, 'deleteusers'])->middleware(['auth']);
Route::get('/create/groups', [groupController::class, 'create'])->middleware(['auth']);
Route::get('/group/chatroom', [groupController::class, 'chatroom'])->middleware(['auth']);
Route::post('/form/group', [groupController::class, 'form'])->middleware(['auth']);
Route::post('/users/group/{idd}/add/{id}', [groupController::class, 'add'])->middleware(['auth']);
Route::get('/create/group/posts', [groupController::class, 'creategrouppost'])->middleware(['auth']);
Route::post('/send/group/post', [groupController::class, 'addchatroom'])->middleware(['auth']);
Route::get('/dm/{email}', [ReplyController::class, 'sendDmview'])->middleware(['auth']);
Route::post('/send/dm', [ReplyController::class, 'sendDm'])->middleware(['auth']);
Route::post('/message/delete/{id}', [ReplyController::class, 'destroy'])->middleware(['auth']);
Route::post('/groups/delete/{id}', [ReplyController::class, 'delete'])->middleware(['auth']);
Route::get('/edit/profile', [ProfileController::class, 'create'])->middleware(['auth']);
Route::get('/group/members/{id}', [groupController::class, 'allmembers'])->middleware(['auth']);
Route::post('/save/record/', [profileController::class, 'update'])->middleware(['auth']);
require __DIR__.'/auth.php';
