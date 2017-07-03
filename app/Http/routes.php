<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\users;
use Illuminate\Http\Request;

Route::get('/', function () {
    $users = users::orderBy('created_at', 'asc')->get();
    return view('users', [
        'users' => $users
    ]);
});

Route::post('/users', function (Request $request) {
     
//バリデーション
$validator = Validator::make($request->all(), [
    'place' => 'required|max:255',
    'shop_name' => 'required|max:255',
    'url' => 'required|active_url|url',
    'who' => 'required|max:255',
    'how' => 'required|max:255',
    'impression' => 'required|max:255',
]);

//バリデーション:エラー 
if ($validator->fails()) {
    return redirect('/')
        ->withInput()
        ->withErrors($validator);
}

$users = new users;
$users->place = $request->place; 
$users->shop_name = $request->shop_name;
$users->url = $request->url; 
$users->who = $request->who; 
$users->how = $request->how; 
$users->impression = $request->impression; 
$users->save(); //「/」ルートにリダイレクト return redirect('/');
return redirect('/');

    
});

Route::delete('/delete/{user}', function (users $user) {
    $user->delete();
    return redirect('/');
});