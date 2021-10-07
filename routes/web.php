<?php

use Illuminate\Support\Facades\Route;
use App\http\livewire\AlbumList;
use App\http\livewire\ArtistList;

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
    return view('auth.login');
});

Route::get('/artists', ArtistList::class)->middleware(['auth'])->name('artists');

Route::get('/albums/{id}', AlbumList::class)->middleware(['auth'])->name('albums');

require __DIR__.'/auth.php';
