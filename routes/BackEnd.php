<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\PostsController;
// use App\Http\Controllers\BackEnd\Customers\CustomersController;
use App\Http\Controllers\AgeController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


 Route::get('/backend', [pagesController::class,'BackEnd']);

 Route::get('/hallo', [pagesController::class,'hallo']);

 Route::get('/form', [pagesController::class,'form']);

//  Route::namespace('Customers')->group(function(){
//      Route::get('/addCustomers',[CustomersController::class, 'addCustomers']);
//      Route::get('/addCustomers',[CustomersController::class, 'addCustomers']);
//      Route::get('/addCustomers',[CustomersController::class, 'addCustomers']);
//  });

//  Route::prefix('/admin')->group(function(){
//     Route::get('/addCustomers',[CustomersController::class, 'addCustomers']);
//     Route::get('/addCustomers',[CustomersController::class, 'addCustomers']);
//     Route::get('/addCustomers',[CustomersController::class, 'addCustomers']);
//  });

// Route::group(['prefix'=>'anas','namespace'=>'Customers'], function(){

//     Route::get('/addCustomers',[CustomersController::class, 'addCustomers']);

// });

 Route::namespace('BackEnd')->group(function(){

     Route::get('/posts',[PostsController::class, 'create']);
     Route::post('/posts',[PostsController::class, 'store'])->name('posts.store');

     Route::get('/posts',[PostsController::class, 'index'])->name('posts.index');

     Route::get('/posts/edit/{id}',[PostsController::class, 'edit'])->name('posts.edit');

     Route::post('/posts/update/{id}',[PostsController::class, 'store'])->name('posts.update');

     Route::get('/posts/delete/{id}',[PostsController::class, 'destroy'])->name('posts.destroy');

 });


//  Route::get('/age', [AgeController::class,'index'])->middleware('ChakAge');

Route::group(['middleware'=>'auth','ChakAge'], function(){
    Route::get('/age', [AgeController::class,'index']);
});

