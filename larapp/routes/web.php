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


/*Route::post('helloword', function () {
    return "<h1>Hola</h1>";
   
});*/

/*Route::get('user/{id}', function ($id) {
    dd(App\User::find($id));
   
});*/

Route::get('examples', function () {
    
    return view('examples');
   
});

/*Route::get('edades', function () {
   $users = App\User::all()->take(10);
    
   foreach ($users as $user) {

    $edad = Carbon::parse($user->birthdate)->diff()->format('%y years old %m %d');
    $creacion = new Carbon($user->created_at);
    $creacion->setlocale('es');
    $tiempo = $creacion->diffForHumans();
    $rs[] = $user->fullname.' tiene '.$edad.' años'.' se creo '.$tiempo;
    
    //forma de mostrar el resultado
    //dump($user->fullname.' tiene '.$edad.' años'.' se creo '.$tiempo);
    //dump($rs); 
   }
   return view('edades', ['rs' => $rs]);
});*/
Auth::routes();

// Resources
Route::resources([
    'users'         => 'UserController',
    'categories'  => 'CategoryController',
    //'games'       => 'GameController',
]);

// Middleware
Route::get('locale/{locale}', 'LocaleController@index');

Route::get('/home', 'HomeController@index')->name('home');


