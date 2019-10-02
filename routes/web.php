<?php
use App\User;
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


Route::get('/users' , function(){
	$users = Cache::rememberForever('user-list',function(){
		return User::all();
	});
	foreach($users as $user){		
		echo $user->id .' '.$user->name .'  -  '. $user->email .' - '.$user->created_at .' -  '. $user->updated_at;
		echo '<br/>';
	}
});