<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/mails', function () {
    \Illuminate\Support\Facades\Mail::send(new \App\Mail\OrderShipped());
    \Illuminate\Support\Facades\Notification::send(\App\Models\User::all(), new \App\Notifications\OrderShipped());

    return view('welcome');
});
//

Route::post('/upload',[\App\Http\Controllers\DocumentsController::class,'upload']);

Route::get('/documents/create', [\App\Http\Controllers\DocumentsController::class, 'create'])->name('documents.create');


//////////////////////////////////

Route::get('edit/{id}', [\App\Http\Controllers\TasksController::class, 'edit']);

Route::put('edit-data/{id}',[\App\Http\Controllers\TasksController::class,'update']);

Route::get('delete/{id}',[\App\Http\Controllers\TasksController::class,'destroy']);


//////////////////////////


Route::get('document_metadata/{id}',[\App\Http\Controllers\document_metadataController::class,'index']);
Route::get('document_metadata/create/{id}',[\App\Http\Controllers\document_metadataController::class,'create']);
Route::post('document_metadata/{id}',[\App\Http\Controllers\document_metadataController::class,'store']);





Route::post('tasks/index/{id}',[\App\Http\Controllers\TasksController::class,'metastore']);

Route::get('tasks/index/{id}', [\App\Http\Controllers\TasksController::class, 'metataskindex'])->name('metataskindex');





Route::get('document_metadata/delete/{id}/{ids}',[\App\Http\Controllers\document_metadataController::class,'destroy']);

//edit route
Route::get('document_metadata/edit/{id}/{ids}',[\App\Http\Controllers\document_metadataController::class,'edit']);

Route::put('document_metadata/update/{id}/{ids}',[\App\Http\Controllers\document_metadataController::class,'update']);


//task

Route::get('tasks/create/{id}', [\App\Http\Controllers\TasksController::class, 'metataskcreate']);


Route::get('task_metadata/create/{id}', [\App\Http\Controllers\TasksController::class, 'metataskcreate']);

///rolessssssssss
///

Route::get('roles/delete/{id}', [\App\Http\Controllers\RoleController::class, 'delete']);

//permissions permission/delete

Route::get('permission/delete/{id}', [\App\Http\Controllers\PermissionController::class, 'delete']);






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('roles', [\App\Http\Controllers\RoleController::class, 'index'])->name('roles');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('permissions', [\App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('documents/{id}', [\App\Http\Controllers\DocumentsController::class, 'delete'])->name('delete');

//    Route::get('document_metadata/{id}', [\App\Http\Controllers\document_metadataController::class, 'delete'])->name('document_metadata.deletedata');


    Route::resource('documents', \App\Http\Controllers\DocumentsController::class);

    Route::resource('document_metadata', \App\Http\Controllers\document_metadataController::class);

    Route::resource('tasks', \App\Http\Controllers\TasksController::class);
    
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);



});


/**
 * Teamwork routes
 */
Route::group(['prefix' => 'teams', 'namespace' => 'Teamwork'], function()
{
    Route::get('/', [App\Http\Controllers\Teamwork\TeamController::class, 'index'])->name('teams.index');
    Route::get('create', [App\Http\Controllers\Teamwork\TeamController::class, 'create'])->name('teams.create');
    Route::post('teams', [App\Http\Controllers\Teamwork\TeamController::class, 'store'])->name('teams.store');
    Route::get('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'edit'])->name('teams.edit');
    Route::put('edit/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'update'])->name('teams.update');
    Route::delete('destroy/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'destroy'])->name('teams.destroy');
    Route::get('switch/{id}', [App\Http\Controllers\Teamwork\TeamController::class, 'switchTeam'])->name('teams.switch');

    Route::get('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'show'])->name('teams.members.show');
    Route::get('members/resend/{invite_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'resendInvite'])->name('teams.members.resend_invite');
    Route::post('members/{id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'invite'])->name('teams.members.invite');
    Route::delete('members/{id}/{user_id}', [App\Http\Controllers\Teamwork\TeamMemberController::class, 'destroy'])->name('teams.members.destroy');

    Route::get('accept/{token}', [App\Http\Controllers\Teamwork\AuthController::class, 'acceptInvite'])->name('teams.accept_invite');
});
