<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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


Route::post('helloword', function () {
    return "<h1>Hola</h1>";
   
});

Route::get('user/{id}', function ($id) {
    dd(App\User::find($id));
   
});

Route::get('edades', function () {
   $users = App\User::all()->take(10);
    
   foreach ($users as $user) {

    $edad = Carbon::parse($user->birthdate)->age;
    $creacion = new Carbon($user->created_at);
    $creacion->setlocale('es');
    $tiempo = $creacion->diffForHumans();
    
    dump($user->fullname.' tiene '.$edad.' años'.' se creo '.$tiempo);
   }
   
});