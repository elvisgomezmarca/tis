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

Auth::routes();

/* 
 Route::get('/', [
     'as' => 'home',
     'uses' => 'HomeController@index'
 ]);
 */

Route::get('/', function() {
    return View('auth.login');
});

Route::get('/reset_password', [
    'as' => 'auth.reset_password',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

/*
Route::get('/announcements', [
    'as' => 'home.announcements',
    'uses' => 'HomeController@announcements'
]);*/

//-----------POSTULANT CREATE--------------//
Route::get('postulans/create', [
    'as' => 'postulans.create',
    'uses' => 'PostulantController@create',
]);
Route::post('postulans/store', [
    'as' => 'postulans.store',
    'uses' => 'PostulantController@store',
]);

////////////////////// ADMIN ROUTES ///////////////////
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.', 'namespace' => 'Admin'], function() {
    Route::get('dashboard', [
        'as' => 'dashboard',
        'uses' => 'HomeController@index'
    ]);

    //------------ USERS --------------//
    Route::get('users', [
        'as' => 'users.index',
        'uses' => 'UserController@index',
    ])->middleware('permission:list users');
    Route::get('users/create', [
        'as' => 'users.create',
        'uses' => 'UserController@create',
    ])->middleware('permission:create users');
    Route::post('users/store', [
        'as' => 'users.store',
        'uses' => 'UserController@store',
    ])->middleware('permission:create users');
    Route::get('users/{user}/edit', [
        'as' => 'users.edit',
        'uses' => 'UserController@edit',
    ])->middleware('permission:edit users');
    Route::put('users/{user}', [
        'as' => 'users.update',
        'uses' => 'UserController@update',
    ])->middleware('permission:edit users');
    Route::patch('users/{user}', [
        'as' => 'users.update',
        'uses' => 'UserController@update',
    ])->middleware('permission:edit users');
    Route::delete('users/{user}', [
        'as' => 'users.destroy',
        'uses' => 'UserController@destroy',
    ])->middleware('permission:delete users');

    /*
    //------------ ROLES --------------//
    Route::get('roles', [
        'as' => 'roles.index',
        'uses' => 'RoleController@index',
    ])->middleware('permission:list roles');
    Route::get('roles/create', [
        'as' => 'roles.create',
        'uses' => 'RoleController@create',
    ])->middleware('permission:list roles');
    Route::post('roles/store', [
        'as' => 'roles.store',
        'uses' => 'RoleController@store',
    ])->middleware('permission:list roles');
    Route::get('roles/{role}/edit', [
        'as' => 'roles.edit',
        'uses' => 'RoleController@edit',
    ])->middleware('permission:list roles');
    Route::put('roles/{role}', [
        'as' => 'roles.update',
        'uses' => 'RoleController@update',
    ])->middleware('permission:list roles');
    Route::patch('roles/{role}', [
        'as' => 'roles.update',
        'uses' => 'RoleController@update',
    ])->middleware('permission:list roles');
    Route::delete('roles/{role}', [
        'as' => 'roles.destroy',
        'uses' => 'RoleController@destroy',
    ])->middleware('permission:list roles');

    //------------ announcements --------------//
    Route::get('announcements', [
        'as' => 'announcements.index',
        'uses' => 'AnnouncementController@index',
    ])->middleware('permission:list announcements');
    Route::get('announcements/{announcement}/show', [
        'as' => 'announcements.show',
        'uses' => 'AnnouncementController@show',
    ]);
    Route::post('announcements/{announcement}/compare', [
        'as' => 'announcements.compare',
        'uses' => 'AnnouncementController@compare',
    ]);
    Route::get('announcements/create', [
        'as' => 'announcements.create',
        'uses' => 'AnnouncementController@create',
    ])->middleware('permission:create announcements');
    Route::post('announcements/store', [
        'as' => 'announcements.store',
        'uses' => 'AnnouncementController@store',
    ])->middleware('permission:create announcements');
    Route::get('announcements/{announcement}/edit', [
        'as' => 'announcements.edit',
        'uses' => 'AnnouncementController@edit',
    ])->middleware('permission:edit announcements');
    Route::put('announcements/{announcement}', [
        'as' => 'announcements.update',
        'uses' => 'AnnouncementController@update',
    ])->middleware('permission:edit announcements');
    Route::put('announcements/{announcement}/update_code', [
        'as' => 'announcements.code',
        'uses' => 'AnnouncementController@updateCode',
    ]);
    Route::patch('announcements/{announcement}', [
        'as' => 'announcements.update',
        'uses' => 'AnnouncementController@update',
    ])->middleware('permission:edit announcements');

    Route::get('announcements/{announcement}/files', [
        'as' => 'requirements.files',
        'uses' => 'AnnouncementController@requirement',
    ]);

    Route::delete('announcements/{announcement}', [
        'as' => 'announcements.destroy',
        'uses' => 'AnnouncementController@destroy',
    ])->middleware('permission:delete announcements');

    //------------ Postulants --------------//
    Route::get('{announcement}/postulants', [
        'as' => 'postulants.index',
        'uses' => 'PostulantController@index',
    ])->middleware('permission:list postulants');
    Route::get('announcements/{announcement}/postulants/{postulant}/files', [
        'as' => 'postulants.show',
        'uses' => 'PostulantController@show',
    ]);
    Route::get('{announcement}/postulants/create', [
        'as' => 'postulants.create',
        'uses' => 'PostulantController@create',
    ])->middleware('permission:create postulants');
    Route::get('{announcement}/postulants/{postulant}/requirement/{requirement}/checked', [
        'as' => 'postulants.checkedFile',
        'uses' => 'PostulantController@checked',
    ]);
    Route::post('{announcement}/postulants/store', [
        'as' => 'postulants.store',
        'uses' => 'PostulantController@store',
    ])->middleware('permission:create postulants');
    Route::get('{announcement}/postulants/{postulant}/edit', [
        'as' => 'postulants.edit',
        'uses' => 'PostulantController@edit',
    ])->middleware('permission:edit postulants');
    Route::put('{announcement}/postulants/{postulant}', [
        'as' => 'postulants.update',
        'uses' => 'PostulantController@update',
    ])->middleware('permission:edit postulants');
    Route::patch('{announcement}/postulants/{postulant}', [
        'as' => 'postulants.update',
        'uses' => 'PostulantController@update',
    ])->middleware('permission:edit postulants');
    Route::delete('{announcement}/postulants/{postulant}', [
        'as' => 'postulants.destroy',
        'uses' => 'PostulantController@destroy',
    ])->middleware('permission:delete postulants');

    //-------------- AREAS ------------------//
    Route::get('areas', [
        'as' => 'areas.index',
        'uses' => 'AreaController@index',
    ])->middleware('permission:list areas');
    Route::get('areas/create', [
        'as' => 'areas.create',
        'uses' => 'AreaController@create',
    ])->middleware('permission:create areas');
    Route::post('areas/store', [
        'as' => 'areas.store',
        'uses' => 'AreaController@store',
    ])->middleware('permission:create areas');
    Route::get('areas/{area}/edit', [
        'as' => 'areas.edit',
        'uses' => 'AreaController@edit',
    ])->middleware('permission:edit areas');
    Route::put('areas/{area}', [
        'as' => 'areas.update',
        'uses' => 'AreaController@update',
    ])->middleware('permission:edit areas');
    Route::patch('areas/{area}', [
        'as' => 'areas.update',
        'uses' => 'AreaController@update',
    ])->middleware('permission:edit areas');
    Route::delete('areas/{area}', [
        'as' => 'areas.destroy',
        'uses' => 'AreaController@destroy',
    ])->middleware('permission:delete areas');

    //-------------- CONVOCATORIAS ------------------//
    Route::get('announcements', [
        'as' => 'announcements.index',
        'uses' => 'AnnouncementController@index',
    ])->middleware('permission:list announcements');
    Route::get('announcements/create', [
        'as' => 'announcements.create',
        'uses' => 'AnnouncementController@create',
    ])->middleware('permission:create announcements');
    Route::post('announcements/store', [
        'as' => 'announcements.store',
        'uses' => 'AnnouncementController@store',
    ])->middleware('permission:create announcements');
    Route::get('announcements/{id}/edit', [
        'as' => 'announcements.edit',
        'uses' => 'AnnouncementController@edit',
    ])->middleware('permission:edit announcements');
    Route::put('announcements/{announcement}', [
        'as' => 'announcements.update',
        'uses' => 'AnnouncementController@update',
    ])->middleware('permission:edit announcements');
    Route::patch('announcements/{announcement}', [
        'as' => 'announcements.update',
        'uses' => 'AnnouncementController@update',
    ])->middleware('permission:edit announcements');
    Route::delete('announcements/{announcement}', [
        'as' => 'announcements.destroy',
        'uses' => 'AnnouncementController@destroy',
    ])->middleware('permission:delete announcements');

    //-------------- REQUIREMENTS ------------------//
    Route::get('{announcement}/requirements', [
        'as' => 'requirements.index',
        'uses' => 'RequirementController@index',
    ])->middleware('permission:list requirements');
    Route::get('{announcement}/requirements/create', [
        'as' => 'requirements.create',
        'uses' => 'RequirementController@create',
    ])->middleware('permission:create requirements');
    Route::post('{announcement}requirements/store', [
        'as' => 'requirements.store',
        'uses' => 'RequirementController@store',
    ])->middleware('permission:create requirements');
    Route::get('{announcement}requirements/{requirement}/edit', [
        'as' => 'requirements.edit',
        'uses' => 'RequirementController@edit',
    ])->middleware('permission:edit requirements');
    Route::put('{announcement}requirements/{requirement}', [
        'as' => 'requirements.update',
        'uses' => 'RequirementController@update',
    ])->middleware('permission:edit requirements');
    Route::patch('{announcement}requirements/{requirement}', [
        'as' => 'requirements.update',
        'uses' => 'RequirementController@update',
    ])->middleware('permission:edit requirements');
    Route::delete('{announcement}requirements/{requirement}', [
        'as' => 'requirements.destroy',
        'uses' => 'RequirementController@destroy',
    ])->middleware('permission:delete requirements');

    // FILES //
    Route::post('{announcement}/requirements/{requirement}/upload', [
        'as' => 'requirements.upload',
        'uses' => 'FileController@upload',
    ]);
    Route::get('{announcement}/requirements/{requirement}/file', [
        'as' => 'requirements.file',
        'uses' => 'FileController@getRequirementFile',
    ]);
    Route::delete('{announcement}/requirements/{requirement}/delete_file', [
        'as' => 'requirements.file_delete',
        'uses' => 'FileController@deleteRequirementFile',
    ]);
    */
});