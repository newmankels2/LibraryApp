<?php

use App\Http\Controllers\logout;
use App\Http\Livewire\Book;
use App\Http\Livewire\BookBorrow;
use App\Http\Livewire\BookType;
use App\Http\Livewire\Login;
use App\Http\Livewire\Member;
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

Route::get('/', Login::class);

Route::middleware(['restrict'])->group(function () {
  Route::get('member', Member::class);
  Route::get('book', Book::class);
  Route::get('booktype', BookType::class);
  Route::get('borrow', BookBorrow::class);
});
route::get('logout', [logout::class, 'logout']);
