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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Modulo
Route::get('modulos/{id}','ModuleController@apiAll');

// Opciones del Juego
Route::get('modulo/{id}/opciones','ModuleController@apiOption');
Route::get('modulo/{id}/aprender/{ido}','ModuleController@apiLearn');

// Puntaje del Juego
Route::get('modulo/{idModule}/estudiante/{idStudent}/puntaje/{score}/respuesta/{answer}','PlayController@apiUpdatePuntaje');
Route::get('puntaje/reiniciar/{idStudent}','PlayController@apiResetScore');

Route::get('estudiantes', 'PlayController@apiStudentAll');
