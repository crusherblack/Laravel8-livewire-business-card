<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Card\Form;
use App\Http\Livewire\Card\EditForm;
use App\Http\Livewire\Home;
use App\Http\Livewire\Adminpage;
use App\Http\Livewire\LandingPage;


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



Route::group(['middleware'=>'auth'], function () {
    Route::get('/admin', Adminpage::class)->name('adminpage');
    Route::get('/home', Home::class)->name('home');
    Route::get('/form', Form::class);
    Route::get('/form/{id}', EditForm::class);      
});

Route::group(['middleware'=>'guest'], function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);
    Route::get('/', LandingPage::class);        
});
