<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/add-post', [BlogController::class, 'create']);

Route::get('/blog-details/{slug}', function($slug){
  $single_post = DB::table('posts')->where('slug', $slug)->first();
  return view('blog-details', [
    'post'  =>  $single_post,
  ]);
});