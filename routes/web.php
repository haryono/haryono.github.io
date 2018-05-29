<?php
include_once 'web_builder.php';
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

Route::pattern('slug', '[a-z0-9- _]+');

Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {

    # Error pages should be shown without requiring login
    Route::get('404', function () {
        return view('admin/404');
    });
    Route::get('500', function () {
        return view('admin/500');
    });
    # Lock screen
    Route::get('{id}/lockscreen', 'UsersController@lockscreen')->name('lockscreen');
    Route::post('{id}/lockscreen', 'UsersController@postLockscreen')->name('lockscreen');
    # All basic routes defined here
    Route::get('login', 'AuthController@getSignin')->name('login');
    Route::get('signin', 'AuthController@getSignin')->name('signin');
    Route::post('signin', 'AuthController@postSignin')->name('postSignin');
    Route::post('signup', 'AuthController@postSignup')->name('admin.signup');
    Route::post('forgot-password', 'AuthController@postForgotPassword')->name('forgot-password');
    Route::get('login2', function () {
        return view('admin/login2');
    });

    Route::get('library', function () {
        return view('admin/library');
    });
    Route::get('Documentation', function () {
        return view('admin/Documentation');
    });


    # Register2
    Route::get('register2', function () {
        return view('admin/register2');
    });
    Route::post('register2', 'AuthController@postRegister2')->name('register2');

    # Forgot Password Confirmation
    Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

    # Logout
    Route::get('logout', 'AuthController@getLogout')->name('logout');

    # Account Activation
    Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    # GUI Crud Generator
    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator_builder');
    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');
    // Model checking
    Route::post('modelCheck', 'ModelcheckController@modelCheck');

    # Dashboard / Index
    Route::get('/', 'JoshController@showHome')->name('dashboard');
    # crop demo
    Route::post('crop_demo', 'JoshController@crop_demo')->name('crop_demo');
    //Log viewer routes
    Route::get('log_viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
    Route::get('log_viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log_viewers.logs');
    Route::delete('log_viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log_viewers.logs.delete');
    Route::get('log_viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log_viewers.logs.show');
    Route::get('log_viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log_viewers.logs.download');
    Route::get('log_viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log_viewers.logs.filter');
    Route::get('log_viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log_viewers.logs.search');
    Route::get('log_viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');
    //end Log viewer
    # Activity log
    Route::get('activity_log/data', 'JoshController@activityLogData')->name('activity_log.data');
    Route::get('addNewCompany', 'RAController@addNewCompany')->name('addNewCompany');
    Route::post('test2', 'RAController@test2')->name('test2');
    //Route::get('/', 'JoshController@index')->name('index');
});

Route::group(['prefix' => 'admin','namespace'=>'Admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {

    # User Management
    Route::group([ 'prefix' => 'users'], function () {
        Route::get('data', 'UsersController@data')->name('users.data');
        Route::get('{user}/delete', 'UsersController@destroy')->name('users.delete');
        Route::get('{user}/confirm-delete', 'UsersController@getModalDelete')->name('users.confirm-delete');
        Route::get('{user}/restore', 'UsersController@getRestore')->name('restore.user');
        //Route::post('{user}/passwordreset', 'UsersController@passwordreset')->name('passwordreset');
        Route::post('passwordreset', 'UsersController@passwordreset')->name('passwordreset');

    });
    Route::resource('users', 'UsersController');

    Route::get('deleted_users',['before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'])->name('deleted_users');

    # Group Management
    Route::group(['prefix' => 'groups'], function () {
        Route::get('{group}/delete', 'GroupsController@destroy')->name('groups.delete');
        Route::get('{group}/confirm-delete', 'GroupsController@getModalDelete')->name('groups.confirm-delete');
        Route::get('{group}/restore', 'GroupsController@getRestore')->name('groups.restore');
    });
    Route::resource('groups', 'GroupsController');

    /*routes for blog*/
    Route::group(['prefix' => 'blog'], function () {
        Route::get('{blog}/delete', 'BlogController@destroy')->name('blog.delete');
        Route::get('{blog}/confirm-delete', 'BlogController@getModalDelete')->name('blog.confirm-delete');
        Route::get('{blog}/restore', 'BlogController@restore')->name('blog.restore');
        Route::post('{blog}/storecomment', 'BlogController@storeComment')->name('storeComment');
    });
    Route::resource('blog', 'BlogController');

    /*routes for blog category*/
    Route::group(['prefix' => 'blogcategory'], function () {
        Route::get('{blogCategory}/delete', 'BlogCategoryController@destroy')->name('blogcategory.delete');
        Route::get('{blogCategory}/confirm-delete', 'BlogCategoryController@getModalDelete')->name('blogcategory.confirm-delete');
        Route::get('{blogCategory}/restore', 'BlogCategoryController@getRestore')->name('blogcategory.restore');
    });
    Route::resource('blogcategory', 'BlogCategoryController');
    /*routes for file*/
    Route::group(['prefix' => 'file'], function () {
        Route::post('create', 'FileController@store')->name('store');
        Route::post('createmulti', 'FileController@postFilesCreate')->name('postFilesCreate');
        Route::delete('delete', 'FileController@delete')->name('delete');
    });

    Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });


    /* laravel example routes */
    #Charts
    Route::get('laravel_chart', 'ChartsController@index')->name('laravel_chart');
    Route::get('database_chart', 'ChartsController@databaseCharts')->name('database_chart');

    # datatables
    Route::get('datatables', 'DataTablesController@index')->name('index');
    Route::get('datatables/data', 'DataTablesController@data')->name('datatables.data');

    # datatables
    Route::get('jtable/index', 'JtableController@index')->name('index');
    Route::post('jtable/store', 'JtableController@store')->name('store');
    Route::post('jtable/update', 'JtableController@update')->name('update');
    Route::post('jtable/delete', 'JtableController@destroy')->name('delete');


    # SelectFilter
    Route::get('selectfilter', 'SelectFilterController@index')->name('selectfilter');
    Route::get('selectfilter/find', 'SelectFilterController@filter')->name('selectfilter.find');
    Route::post('selectfilter/store', 'SelectFilterController@store')->name('selectfilter.store');

    # editable datatables New Company
    //Route::get('addNewCompany', 'RAController@addNewCompany')->name('addNewCompany');
    Route::get('editable_datatables/data', 'EditableDataTablesController@data')->name('editable_datatables.data');
    Route::get('editable_datatables/buttonData', 'EditableDataTablesController@buttonData')->name('editable_datatables.buttonData');
    Route::post('editable_datatables/create', 'EditableDataTablesController@store')->name('store');
    Route::post('editable_datatables/{id}/update', 'EditableDataTablesController@update')->name('update');
    Route::get('editable_datatables/{id}/approve', 'EditableDataTablesController@approve')->name('approve');
    Route::post('editable_datatables/{id}/reject', 'EditableDataTablesController@reject')->name('reject');
    Route::get('editable_datatables/{id}/delete', 'EditableDataTablesController@destroy')->name('editable_datatables.delete');

    # industrys datatables
    Route::get('industrys', 'Industrys_Controller@index')->name('ind.index');
    Route::get('industrys/data', 'Industrys_Controller@data')->name('ind.data');
    Route::get('industrys/buttonData', 'Industrys_Controller@buttonData')->name('ind.index2');
    Route::post('industrys/create', 'Industrys_Controller@store')->name('ind.store');
    Route::post('industrys/{id}/update', 'Industrys_Controller@update')->name('ind.update');
    Route::get('industrys/{id}/approve', 'Industrys_Controller@approve')->name('ind.approve');
    Route::post('industrys/{id}/reject', 'Industrys_Controller@reject')->name('ind.reject');
    Route::get('industrys/{id}/delete', 'Industrys_Controller@destroy')->name('ind.delete');

    # possible accident datatables
    Route::get('possible_accidents', 'PossibleAccidentController@index')->name('pa.index');
    Route::get('possible_accidents/data', 'PossibleAccidentController@data')->name('pa.data');
    Route::get('possible_accidents/buttonData', 'PossibleAccidentController@buttonData')->name('pa.index2');
    Route::post('possible_accident/create', 'PossibleAccidentController@store')->name('pa.store');
    Route::post('possible_accident/{id}/update', 'PossibleAccidentController@update')->name('pa.update');
    Route::get('possible_accident/{id}/approve', 'PossibleAccidentController@approve')->name('pa.approve');
    Route::post('possible_accident/{id}/reject', 'PossibleAccidentController@reject')->name('pa.reject');
    Route::get('possible_accident/{id}/delete', 'PossibleAccidentController@destroy')->name('pa.delete');

    # hazardlist datatables
    Route::get('hazardlist', 'HazardListController@index')->name('hl.index');
    Route::get('hazardlist/data', 'HazardListController@data')->name('hl.data');
    Route::get('hazardlist/buttonData', 'HazardListController@buttonData')->name('hl.index2');
    Route::post('hazardlist/create', 'HazardListController@store')->name('hl.store');
    Route::post('hazardlist/{id}/update', 'HazardListController@update')->name('hl.update');
    Route::get('hazardlist/{id}/approve', 'HazardListController@approve')->name('hl.approve');
    Route::post('hazardlist/{id}/reject', 'HazardListController@reject')->name('hl.reject');
    Route::get('hazardlist/{id}/delete', 'HazardListController@destroy')->name('hl.delete');

    # Existing Risk Control datatables
    Route::get('Existing_risk_control', 'Existing_Risk_Controller@index')->name('erc.index');
    Route::get('Existing_risk_control/data', 'Existing_Risk_Controller@data')->name('erc.data');
    Route::get('Existing_risk_control/buttonData', 'Existing_Risk_Controller@buttonData')->name('erc.index2');
    Route::post('Existing_risk_control/create', 'Existing_Risk_Controller@store')->name('erc.store');
    Route::post('Existing_risk_control/{id}/update', 'Existing_Risk_Controller@update')->name('erc.update');
    Route::get('Existing_risk_control/{id}/approve', 'Existing_Risk_Controller@approve')->name('erc.approve');
    Route::post('Existing_risk_control/{id}/reject', 'Existing_Risk_Controller@reject')->name('erc.reject');
    Route::get('Existing_risk_control/{id}/delete', 'Existing_Risk_Controller@destroy')->name('erc.delete');

    # Additional Risk Control datatables
    Route::get('Additional_risk_control', 'Additional_Risk_Controller@index')->name('arc.index');
    Route::get('Additional_risk_control/data', 'Additional_Risk_Controller@data')->name('arc.data');
    Route::get('Additional_risk_control/buttonData', 'Additional_Risk_Controller@buttonData')->name('arc.index2');
    Route::post('Additional_risk_control/create', 'Additional_Risk_Controller@store')->name('arc.store');
    Route::post('Additional_risk_control/{id}/update', 'Additional_Risk_Controller@update')->name('arc.update');
    Route::get('Additional_risk_control/{id}/approve', 'Additional_Risk_Controller@approve')->name('arc.approve');
    Route::post('Additional_risk_control/{id}/reject', 'Additional_Risk_Controller@reject')->name('arc.reject');
    Route::get('Additional_risk_control/{id}/delete', 'Additional_Risk_Controller@destroy')->name('arc.delete');

    # Risk Assessment
    Route::get('Riskassessment', 'Riskassessment_Controller@index')->name('rac.index');
    Route::get('Riskassessment/data', 'Riskassessment_Controller@data')->name('rac.data');
    Route::get('Riskassessment/buttonData', 'Riskassessment_Controller@buttonData')->name('rac.index2');
    Route::post('Riskassessment/create', 'Riskassessment_Controller@store')->name('rac.store');
    Route::post('Riskassessment/{id}/update', 'Riskassessment_Controller@update')->name('rac.update');
    Route::get('Riskassessment/{id}/approve', 'Riskassessment_Controller@approve')->name('rac.approve');
    Route::post('Riskassessment/{id}/reject', 'Riskassessment_Controller@reject')->name('rac.reject');
    Route::get('Riskassessment/{id}/delete', 'Riskassessment_Controller@destroy')->name('rac.delete');
    //Route::post('processRA', 'Riskassessment_Controller@processRA')->name('processRA');   
   
    # Inv_of_workactivities
    Route::get('Inv_of_workact', 'InventoryOfWorkController@index')->name('iow.index');
    Route::get('Inv_of_workact/data', 'InventoryOfWorkController@datainventory')->name('iow.datainventory');
    Route::get('Inv_of_workact/buttonData', 'InventoryOfWorkController@buttonData')->name('iow.index2');
    Route::post('Inv_of_workact/create', 'InventoryOfWorkController@store')->name('iow.store');
    Route::get('Inv_of_workact/{id}/delete', 'InventoryOfWorkController@destroy')->name('iow.delete');
    Route::post('processRA', 'InventoryOfWorkController@processRA')->name('processRA');   
    Route::get('invOfWorkAct/{id}', 'InventoryOfWorkController@invOfWorkAct')->name('invOfWorkAct');

    # Create Inv_of_workactivities
    Route::get('Create_inv_of_workact', 'InventoryOfWorkController@cindex')->name('ciow.index');
    Route::get('Create_inv_of_workact/data', 'InventoryOfWorkController@data')->name('ciow.data');
    Route::get('Create_inv_of_workact/buttonData', 'InventoryOfWorkController@buttonData')->name('ciow.index2');
    Route::post('Create_inv_of_workact/create', 'InventoryOfWorkController@store')->name('ciow.store');
    Route::get('Create_inv_of_workact/{id}/delete', 'InventoryOfWorkController@destroy')->name('ciow.delete');
    //Route::post('processRA', 'Create_inventoryOfWorkController@processRA')->name('processRA');   
    Route::get('Create_invOfWorkAct', 'InventoryOfWorkController@Create_invOfWorkAct')->name('Create_invOfWorkAct');

    # Raregister 
    Route::get('Ra_register', 'Raregister_Controller@index')->name('ra.index');
    Route::get('Ra_register/data', 'Raregister_Controller@datainventory')->name('ra.datainventory');
    Route::post('Ra_register/updateSowRemarks', 'Raregister_Controller@updateSowRemarks')->name('ra.updateSowRemarks');
    Route::get('Ra_register/buttonData', 'Raregister_Controller@buttonData')->name('ra.index2');
    Route::post('Ra_register/create', 'Raregister_Controller@store')->name('ra.store');
    Route::get('Ra_register/{id}/delete', 'Raregister_Controller@destroy')->name('ra.delete');
    Route::post('processreg', 'Raregister_Controller@processreg')->name('processreg');   
    Route::get('raRegister/{id}', 'Raregister_Controller@raRegister')->name('raRegister');
    Route::get('raRegisterDoc/{id}', 'Raregister_Controller@raRegisterDoc')->name('raRegisterDoc');    
    # Create Raregister
    Route::get('Create_raregister', 'Raregister_Controller@cindex')->name('cra.index');
    Route::get('Create_raregister/data', 'Raregister_Controller@data')->name('cra.data');
    Route::get('Create_raregister/buttonData', 'Raregister_Controller@buttonData')->name('cra.index2');
    Route::post('Create_raregister/create', 'Raregister_Controller@store')->name('cra.store');
    Route::get('Create_raregister/{id}/delete', 'Raregister_Controller@destroy')->name('cra.delete');
   
    # RAIP 
    Route::get('RAIP', 'RAIP_Controller@index')->name('raip.index');
    Route::get('RAIP/data', 'RAIP_Controller@datainventory')->name('raip.datainventory');
    Route::post('RAIP/updateEndRemarks', 'RAIP_Controller@updateEndRemarks')->name('raip.updateEndRemarks');
    Route::get('RAIP/buttonData', 'RAIP_Controller@buttonData')->name('raip.index2');
    Route::post('RAIP/create', 'RAIP_Controller@store')->name('raip.store');
    Route::get('RAIP/{id}/delete', 'RAIP_Controller@destroy')->name('raip.delete');
    Route::post('processRAIP', 'RAIP_Controller@processRAIP')->name('processRAIP');   
    Route::get('RAIP/{id}', 'RAIP_Controller@RAIP')->name('RAIP');
    Route::get('RAIPDoc/{id}', 'RAIP_Controller@RAIPDoc')->name('RAIPDoc');    
    Route::get('raImpPlan', 'RAController@raImpPlan')->name('raImpPlan');  
    Route::get('raImpPlanDoc', 'RAController@raImpPlanDoc')->name('raImpPlanDoc');  

    # Create RAIP
    Route::get('Create_RAIP', 'RAIP_Controller@cindex')->name('craip.index');
    Route::get('Create_RAIP/data', 'RAIP_Controller@data')->name('craip.data');
    Route::get('Create_RAIP/buttonData', 'RAIP_Controller@buttonData')->name('craip.index2');
    Route::post('Create_RAIP/create', 'RAIP_Controller@store')->name('craip.store');
    Route::get('Create_RAIP/{id}/delete', 'RAIP_Controller@destroy')->name('craip.delete');
    
    # Work Activity List datatables
    Route::get('Workactivitylist', 'Workactivitylist_Controller@index')->name('wal.index');
    Route::get('Workactivitylist/data', 'Workactivitylist_Controller@data')->name('wal.data');
    Route::get('Workactivitylist/buttonData', 'Workactivitylist_Controller@buttonData')->name('wal.index2');
    Route::post('Workactivitylist/create', 'Workactivitylist_Controller@store')->name('wal.store');
    Route::post('Workactivitylist/{id}/update', 'Workactivitylist_Controller@update')->name('wal.update');
    Route::get('Workactivitylist/{id}/approve', 'Workactivitylist_Controller@approve')->name('wal.approve');
    Route::post('Workactivitylist/{id}/reject', 'Workactivitylist_Controller@reject')->name('wal.reject');
    Route::get('Workactivitylist/{id}/delete', 'Workactivitylist_Controller@destroy')->name('wal.delete');

    # RA Processes datatables
    Route::get('Raprocesse', 'Raprocesse_Controller@index')->name('rap.index');
    Route::get('Raprocesse/data', 'Raprocesse_Controller@data')->name('rap.data');
    Route::get('Raprocesse/buttonData', 'Raprocesse_Controller@buttonData')->name('rap.index2');
    Route::post('Raprocesse/create', 'Raprocesse_Controller@store')->name('rap.store');
    Route::post('Raprocesse/{id}/update', 'Raprocesse_Controller@update')->name('rap.update');
    Route::get('Raprocesse/{id}/approve', 'Raprocesse_Controller@approve')->name('rap.approve');
    Route::post('Raprocesse/{id}/reject', 'Raprocesse_Controller@reject')->name('rap.reject');
    Route::get('Raprocesse/{id}/delete', 'Raprocesse_Controller@destroy')->name('rap.delete');


//    # custom datatables
    Route::get('custom_datatables', 'CustomDataTablesController@index')->name('index');
    Route::get('custom_datatables/sliderData', 'CustomDataTablesController@sliderData')->name('custom_datatables.sliderData');
    Route::get('custom_datatables/radioData', 'CustomDataTablesController@radioData')->name('custom_datatables.radioData');
    Route::get('custom_datatables/selectData', 'CustomDataTablesController@selectData')->name('custom_datatables.selectData');
    Route::get('custom_datatables/buttonData', 'CustomDataTablesController@buttonData')->name('custom_datatables.buttonData');
    Route::get('custom_datatables/totalData', 'CustomDataTablesController@totalData')->name('custom_datatables.totalData');

    //tasks section
    Route::post('task/create', 'TaskController@store')->name('store');
    Route::get('task/data', 'TaskController@data')->name('data');
    Route::post('task/{task}/edit', 'TaskController@update')->name('update');
    Route::post('task/{task}/delete', 'TaskController@delete')->name('delete');

});



# Remaining pages will be called from below controller method
# in real world scenario, you may be required to define all routes manually

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('{name?}', 'JoshController@showView');

});

#FrontEndController
Route::get('login', 'FrontEndController@getLogin')->name('login');
Route::post('login', 'FrontEndController@postLogin')->name('login');
Route::get('register', 'FrontEndController@getRegister')->name('register');
Route::post('register','FrontEndController@postRegister')->name('register');
Route::get('activate/{userId}/{activationCode}','FrontEndController@getActivate')->name('activate');
Route::get('forgot-password','FrontEndController@getForgotPassword')->name('forgot-password');
Route::post('forgot-password', 'FrontEndController@postForgotPassword');

# Forgot Password Confirmation
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
Route::get('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@getForgotPasswordConfirm')->name('forgot-password-confirm');
# My account display and update details
Route::group(['middleware' => 'user'], function () {
    Route::put('my-account', 'FrontEndController@update');
    Route::get('my-account', 'FrontEndController@myAccount')->name('my-account');
    /** test display **/
    Route::get('newRA', 'RAController@newRA')->name('newRA');
    Route::post('addNewRA', 'RAController@addNewRA')->name('addNewRA');    
    Route::get('addNewRADoc', 'RAController@addNewRADoc')->name('addNewRADoc');     
    Route::get('riskMgmtPlan', 'RAController@riskMgmtPlan')->name('riskMgmtPlan');
    Route::get("generate-pdf","RAController@downloadPDF")->name('generate-pdf');
    Route::get("generateWorkAct","RAController@downloadWorkAct")->name('downloadWorkAct');
      
});
Route::get('logout', 'FrontEndController@getLogout')->name('logout');
# contact form
Route::post('contact', 'FrontEndController@postContact')->name('contact');

//For generating pdf
Route::get("download-pdf","HomeController@downloadPDF");
Route::get("SafeWorkProcedure","HomeController@SafeWorkProcedure");
Route::get('pdfview2',array('as'=>'pdfview','uses'=>'HomeController@pdfview'));

/** testing corner **/
Route::get('/edit/company/{id}','TestController@edit');
Route::post('/edit/company/{id}','TestController@update');
Route::delete('/delete/company/{id}','TestController@destroy');
// end of test

#frontend views // to change to a view
Route::get('/', ['as' => 'home', function () {
    return view('index');
}]);

Route::get('forge',function(){
    return 'working fine';
});

Route::get('blog','BlogController@index')->name('blog');
Route::get('blog/{slug}/tag', 'BlogController@getBlogTag');
Route::get('blogitem/{slug?}', 'BlogController@getBlog');
Route::post('blogitem/{blog}/comment', 'BlogController@storeComment');


Route::get('{name?}', 'FrontEndController@showFrontEndView');
# End of frontend views
