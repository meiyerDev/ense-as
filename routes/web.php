<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function() {
	Route::group(['prefix' => 'profesores'], function() {
    Route::get('listado', 'TeacherController@teacherList')->name('teachers.list');
    Route::get('nuevo', 'TeacherController@teacherAdd')->name('teachers.add');
    Route::post('nuevo', 'TeacherController@teacherCreate')->name('teachers.crear');
		Route::post('editar/{id}', 'TeacherController@teacherSendEdit')->name('teacher.send.edit');
		Route::get('{id}', 'TeacherController@teacherView')->name('teacher.view');
	});

	Route::group(['prefix' => 'cursos'], function() {
		Route::get('listado', 'CurseController@curseList')->name('curses.list');
		Route::get('nuevo', 'CurseController@curseAdd')->name('curses.add');
		Route::post('nuevo', 'CurseController@curseCreate')->name('curses.crear');
		Route::get('editar/{id}', 'CurseController@curseEdit')->name('curses.edit');
		Route::post('editar/{id}', 'CurseController@curseSendEdit')->name('curses.send.edit');
	});

	Route::group(['prefix' => 'estudiantes'], function() {
	    Route::get('listado', 'StudentController@studentList')->name('students.list');
	    Route::get('nuevo', 'StudentController@studentAdd')->name('students.add');
	    Route::post('nuevo', 'StudentController@studentCreate')->name('students.crear');
	    Route::get('{id}', 'StudentController@studentView')->name('student.view');
	    Route::post('editar/{id}', 'StudentController@studentSendEdit')->name('student.send.edit');
	});
  
	Route::group(['prefix' => 'ajax'], function() {
  	Route::get('curse/all', 'CurseController@curseAll')->name('ajax.curse');
	});

});

Route::get('juego','PlayController@index');