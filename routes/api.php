<?php

use App\Http\Controllers\Logcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// login -----register
Route::post('login',[Logcontroller::class,'login']);
Route::post('register',[Logcontroller::class,'register']);

//schools 
Route::post('saveschool','schoolcontroller@saveschool');
Route::post('getschools','schoolcontroller@getschools');

Route::post('getthisschool','schoolcontroller@getthisschool');
Route::post('updateschool','schoolcontroller@updateschool');
Route::post('deleteschool','schoolcontroller@deleteschool');


//emp
Route::get('getaddinfo','Empcontroller@getaddinfo');
Route::post('addemp','Empcontroller@addemp');
Route::post('getemps','Empcontroller@getemps');
Route::post('updateemp','Empcontroller@updateemp');
Route::post('deleteemp','Empcontroller@deleteemp');


// daragai
Route::post('savedaraga','Dash_daragacontroller@savedaraga');
Route::get('getdaraga','Dash_daragacontroller@getdaraga');
Route::post('editdaraga','Dash_daragacontroller@editdaraga');
Route::post('deletedaraga','Dash_daragacontroller@deletedaraga');

Route::post('savestate','Dash_statecontroller@savestate');
Route::get('getstate','Dash_statecontroller@getstate');
Route::post('editstate','Dash_statecontroller@editstate');
Route::post('deletestate','Dash_statecontroller@deletestate');

Route::post('savekdr','Dash_kdrcontroller@savekdr');
Route::get('getkdr','Dash_kdrcontroller@getkdr');
Route::post('editkdr','Dash_kdrcontroller@editkdr');
Route::post('deletekdr','Dash_kdrcontroller@deletekdr');

