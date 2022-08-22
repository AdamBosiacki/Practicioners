<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PracticionerController;

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/',function (){
    if(Auth::user())
    {
        return redirect('/dashboard');
    }else
    {
        return redirect('/login');
    }
});

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/user/test',[\App\Http\Controllers\UserController::class, 'test']);
Route::get('/admin/test',[\App\Http\Controllers\AdminController::class, 'test']);
Route::get('/moderator/test',[\App\Http\Controllers\ModeratorController::class, 'test']);

Route::get("/dashboard",function (){
    return view("dashboard");
})->middleware("auth");

Route::get('UserEdit', [\App\Http\Controllers\UserEditController::class, 'index']);
Route::post('UserEdit', [\App\Http\Controllers\UserEditController::class, 'profileUpdate']);

Route::get('/Practicioners', [PracticionerController::class, 'index']);
Route::post('/store', [PracticionerController::class, 'store'])->name('store');
Route::get('/fetchall', [PracticionerController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [PracticionerController::class, 'delete'])->name('delete');
Route::get('/edit', [PracticionerController::class, 'edit'])->name('edit');
Route::post('/update', [PracticionerController::class, 'update'])->name('update');

Route::get("/Moderators",[\App\Http\Controllers\ModeratorController::class,'Moderators']);
Route::get('/fetchAllModerators', [\App\Http\Controllers\ModeratorController::class, 'fetchAllModerators'])->name('fetchAllModerators');
Route::get('/editModerator', [\App\Http\Controllers\ModeratorController::class, 'edit'])->name('editModerator');
Route::delete('/deleteModerator', [\App\Http\Controllers\ModeratorController::class, 'delete'])->name('deleteModerator');

Route::post('/storeModerator', [\App\Http\Controllers\ModeratorController::class, 'store'])->name('storeModerator');
Route::post('/updateModerator', [\App\Http\Controllers\ModeratorController::class, 'update'])->name('updateModerator');

Route::get('/PracticionerDetails/{userId}', [\App\Http\Controllers\PracticionerDetailsController::class, 'getShow'])->name('PracticionerDetails');

Route::delete('/deleteRole',[\App\Http\Controllers\PracticionerDetailsController::class,'deleteRole']);
Route::delete('/deleteExperience',[\App\Http\Controllers\PracticionerDetailsController::class,'deleteExperience']);
Route::delete('/deleteZatrudnienie',[\App\Http\Controllers\PracticionerDetailsController::class,'deleteZatrudnienie']);
Route::post('/storeRole',[\App\Http\Controllers\PracticionerDetailsController::class,'storeRole']);

Route::post('/storeExp',[\App\Http\Controllers\PracticionerDetailsController::class,'storeExp']);
Route::post('/storeEmp',[\App\Http\Controllers\PracticionerDetailsController::class,'storeEmp']);
Route::get('/editRole', [\App\Http\Controllers\PracticionerDetailsController::class,'editRole'])->name('editRole');
Route::post('/updateRole', [\App\Http\Controllers\PracticionerDetailsController::class, 'updateRole'])->name('updateRole');
