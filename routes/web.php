<?php

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

Route::get('/exercises', function(){
  RewriteRule ^exercises$ ../Http/Controllers/exercise.php?action=index
  RewriteRule ^exercises/new$ ../Http/Controllers/exercise.php?action=new
});
