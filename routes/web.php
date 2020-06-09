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
	$programOnDemand ="Alchemy";
    return view('welcome')->with(['pod'=>$programOnDemand]);
})->name("/");
Route::get('/Login','Login@loadLogin');
Route::get('/Gallery','GalleryController@loadGallery');
Route::get('/Publications','PublicationsController@loadPublications');
Route::get('/Logout','Login@logoutRequest');
Route::get('/DashBoard/{key}','StakeHolder@loadDashBoard')->middleware("revalidate");
Route::get('/ManagePrograms/{key}','NavigationController@loadManagePrograms')->middleware("revalidate");
Route::get('/ManageSchools/{key}','SchoolsController@loadManageSchools')->middleware("revalidate");
Route::get('/ManageGallery/{key}','GalleryController@loadManageGallery')->middleware("revalidate");
Route::get('/About','NavigationController@loadAbout');
Route::get('/Programs','ListProgramsController@getProgramsList');
Route::get('/Register/{id}/{level}','RegistrationController@loadRegistration');
Route::get('/RegisterProgram','RegistrationController@loadProgramRegistration');
Route::get('/ProgramDescription/{id}','ListProgramsController@programDetails');
Route::get('/InfoRegistration/{id}/{key}','SchoolsController@registrationDetails');
Route::get('/Settings/{key}','SettingsCOntroller@loadSettings')->middleware("revalidate");
Route::post('/LoginRequest','Login@requestLogin');
Route::post('/SaveDepartment','ProgramManagementController@requestSaveDepartment');
Route::post('/SaveProgram','ProgramManagementController@requestSaveProgram');
Route::post('/EditProgram','ProgramManagementController@requestEditProgram');
Route::post('/DeletePrograms','ProgramManagementController@requestDeletePrograms');
Route::post('/EditDepartment','ProgramManagementController@requestEditDepartment');
Route::post('/SaveProgramHistory','GalleryController@requestSaveProgramHistory');
Route::post('/DeleteDepartment','ProgramManagementController@requestDeleteDepartment');
Route::post('/FilterPrograms','ListProgramsController@requestAjax')->name('filter');
Route::post('/SaveSchool','SchoolsRegistrationController@requestSaveSchool');
