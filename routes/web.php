<?php

use Illuminate\Support\Facades\Route;
use App\http\Livewire\AlbumList;
use App\http\Livewire\ArtistList;

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

Route::get('/artists', ArtistList::class)->middleware(['auth'])->name('artist.list');

Route::get('/albums/{id}', AlbumList::class)->middleware(['auth'])->name('album.list');

require __DIR__.'/auth.php';
