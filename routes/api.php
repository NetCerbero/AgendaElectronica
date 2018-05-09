<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('loginAndroid','PersonaController@Verificar');
Route::post('setToken','ChatController@SetToken');
Route::get('getToken/{id}','ChatController@GetToken');
Route::get('getHijos/{email}','ChatController@GetHijoChat');
Route::post('setMensajeAndroid','ChatController@SetMensajeAndroid');
Route::get('getAgendas/{email}','AgendaController@GetAgendas');