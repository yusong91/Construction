<?php

use \Vanguard\Http\Controllers\Web\{
   
    CommonCodeController
};

use Illuminate\Http\Request;

/**
 * Authentication
 */
Route::get('login', 'Auth\LoginController@show');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');

Route::group(['middleware' => ['registration', 'guest']], function () {
    Route::get('register', 'Auth\RegisterController@show');
    Route::post('register', 'Auth\RegisterController@register');
});

Route::emailVerification();

Route::group(['middleware' => ['password-reset', 'guest']], function () {
    Route::resetPassword();
});

/**
 * Two-Factor Authentication
 */
Route::group(['middleware' => 'two-factor'], function () {
    Route::get('auth/two-factor-authentication', 'Auth\TwoFactorTokenController@show')->name('auth.token');
    Route::post('auth/two-factor-authentication', 'Auth\TwoFactorTokenController@update')->name('auth.token.validate');
});

/**
 * Social Login
 */
Route::get('auth/{provider}/login', 'Auth\SocialAuthController@redirectToProvider')->name('social.login');
Route::get('auth/{provider}/callback', 'Auth\SocialAuthController@handleProviderCallback');

/**
 * Impersonate Routes
 */
Route::group(['middleware' => 'auth'], function () {
    Route::impersonate();
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    /**
     * Dashboard
     */

    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/user/dashboard', 'DashboardController@userDashboard')->name('userdashboard');

    /**
     * User Profile
     */

    Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {
        Route::get('/', 'ProfileController@show')->name('profile');
        Route::get('activity', 'ActivityController@show')->name('profile.activity');
        Route::put('details', 'DetailsController@update')->name('profile.update.details');

        Route::post('avatar', 'AvatarController@update')->name('profile.update.avatar');
        Route::post('avatar/external', 'AvatarController@updateExternal')
            ->name('profile.update.avatar-external');

        Route::put('login-details', 'LoginDetailsController@update')
            ->name('profile.update.login-details');

        Route::get('sessions', 'SessionsController@index')
            ->name('profile.sessions')
            ->middleware('session.database');

        Route::delete('sessions/{session}/invalidate', 'SessionsController@destroy')
            ->name('profile.sessions.invalidate')
            ->middleware('session.database');
    });

    /**
     * Two-Factor Authentication Setup
     */

    Route::group(['middleware' => 'two-factor'], function () {
        Route::post('two-factor/enable', 'TwoFactorController@enable')->name('two-factor.enable');

        Route::get('two-factor/verification', 'TwoFactorController@verification')
            ->name('two-factor.verification')
            ->middleware('verify-2fa-phone');

        Route::post('two-factor/resend', 'TwoFactorController@resend')
            ->name('two-factor.resend')
            ->middleware('throttle:1,1', 'verify-2fa-phone');

        Route::post('two-factor/verify', 'TwoFactorController@verify')
            ->name('two-factor.verify')
            ->middleware('verify-2fa-phone');

        Route::post('two-factor/disable', 'TwoFactorController@disable')->name('two-factor.disable');
    }); 

    /**
     * List
     */
    Route::resource('equipment', 'EquipmentController')->middleware('permission:equipment');
    Route::get('excel/equipment', 'EquipmentController@downloadExcel')->name('excel/equipment')->middleware('permission:equipment');
    Route::get('pdf/equipment', 'EquipmentController@downloadPdf')->name('pdf/equipment')->middleware('permission:equipment');

    /** 
     * Report
     */
    Route::resource('report-standard', 'ReportStandardController')->middleware('permission:report');
    Route::get('pdf/report/standard', 'ReportStandardController@downloadPdf')->name('pdf.report.standard')->middleware('permission:report');

    /**
     * Report Equipment
     */
    Route::resource('report-equipment', 'ReportEquipmentController')->middleware('permission:report.equipment.index');

    /**
     * Report Movement
     */
    Route::resource('report-movement', 'ReportMovementController')->middleware('permission:report.movement.index');
 
    /**
     * Report Equipment Outstanding
     */
    Route::resource('report-equipmentoutstand', 'ReportEquipmentOutStandController')->middleware('permission:report.equipmentoutstand.index');
    Route::get('excel/outstand', 'ReportEquipmentOutStandController@downloadExcel')->name('excel/outstand')->middleware('permission:report.equipmentoutstand.index');
    Route::get('pdf/outstand', 'ReportEquipmentOutStandController@downloadPdf')->name('pdf/outstand')->middleware('permission:report.equipmentoutstand.index');

    /**
     * Warehouse
     */
    Route::resource('warehouse', 'WarehouseController');

    /**
     * User Management
     */
    Route::resource('users', 'Users\UsersController')
        ->except('update')->middleware('permission:users.manage');

    Route::group(['prefix' => 'users/{user}', 'middleware' => 'permission:users.manage'], function () {
        Route::put('update/details', 'Users\DetailsController@update')->name('users.update.details');
        Route::put('update/login-details', 'Users\LoginDetailsController@update')
            ->name('users.update.login-details');

        Route::post('update/avatar', 'Users\AvatarController@update')->name('user.update.avatar');
        Route::post('update/avatar/external', 'Users\AvatarController@updateExternal')
            ->name('user.update.avatar.external');

        Route::get('sessions', 'Users\SessionsController@index')
            ->name('user.sessions')->middleware('session.database');

        Route::delete('sessions/{session}/invalidate', 'Users\SessionsController@destroy')
            ->name('user.sessions.invalidate')->middleware('session.database');

        Route::post('two-factor/enable', 'TwoFactorController@enable')->name('user.two-factor.enable');
        Route::post('two-factor/disable', 'TwoFactorController@disable')->name('user.two-factor.disable');
    });

    /**
     * Roles & Permissions
     */
    Route::group(['namespace' => 'Authorization'], function () {
        Route::resource('roles', 'RolesController')->except('show')->middleware('permission:roles.manage');

        Route::post('permissions/save', 'RolePermissionsController@update')
            ->name('permissions.save')
            ->middleware('permission:permissions.manage');

        Route::resource('permissions', 'PermissionsController')->middleware('permission:permissions.manage');
    });

    /**
     * Settings
     */

    Route::get('settings', 'SettingsController@general')->name('settings.general')
        ->middleware('permission:settings.general');

    Route::post('settings/general', 'SettingsController@update')->name('settings.general.update')
        ->middleware('permission:settings.general');

    Route::get('settings/auth', 'SettingsController@auth')->name('settings.auth')
        ->middleware('permission:settings.auth');

    Route::post('settings/auth', 'SettingsController@update')->name('settings.auth.update')
        ->middleware('permission:settings.auth');

    if (config('services.authy.key')) {
        Route::post('settings/auth/2fa/enable', 'SettingsController@enableTwoFactor')
            ->name('settings.auth.2fa.enable')
            ->middleware('permission:settings.auth');

        Route::post('settings/auth/2fa/disable', 'SettingsController@disableTwoFactor')
            ->name('settings.auth.2fa.disable')
            ->middleware('permission:settings.auth');
    }

    Route::post('settings/auth/registration/captcha/enable', 'SettingsController@enableCaptcha')
        ->name('settings.registration.captcha.enable')
        ->middleware('permission:settings.auth');

    Route::post('settings/auth/registration/captcha/disable', 'SettingsController@disableCaptcha')
        ->name('settings.registration.captcha.disable')
        ->middleware('permission:settings.auth');

    Route::get('settings/notifications', 'SettingsController@notifications')
        ->name('settings.notifications')
        ->middleware('permission:settings.notifications');

    Route::post('settings/notifications', 'SettingsController@update')
        ->name('settings.notifications.update')
        ->middleware('permission:settings.notifications');

    /**
     * Activity Log
     */ 

    Route::get('activity', 'ActivityController@index')->name('activity.index')
        ->middleware('permission:users.activity');
 
    Route::get('activity/user/{user}/log', 'Users\ActivityController@index')->name('activity.user')
        ->middleware('permission:users.activity');

    Route::get('common-codes', [CommonCodeController::class,'index'])->name('common-codes.index');
    Route::get('common-codes/update-order', [CommonCodeController::class,'updateOrder'])->name('common-codes.update-order');
    Route::get('common-codes/create', [CommonCodeController::class,'create'])->name('common-codes.create');
    Route::post('common-codes/store', [CommonCodeController::class,'store'])->name('common-codes.store');
    Route::get('common-codes/show/{id}', [CommonCodeController::class,'show'])->name('common-codes.show');
    Route::get('common-codes/edit/{id}', [CommonCodeController::class,'edit'])->name('common-codes.edit');
    Route::put('common-codes/update/{id}', [CommonCodeController::class,'update'])->name('common-codes.update');
    Route::delete('common-codes/destroy/{id}', [CommonCodeController::class,'destroy'])->name('common-codes.destroy');

    /** 
     * Spare-Part
     */
    Route::resource('sparepart', 'SparepartController')->middleware('permission:spartpart.index');
    Route::get('excel/sparepart', 'SparepartController@downloadExcel')->name('excel/sparepart')->middleware('permission:spartpart.index');
    Route::get('pdf/sparepart', 'SparepartController@downloadPdf')->name('pdf/sparepart')->middleware('permission:spartpart.index');


    /**
     * Category Inventory
     */
    Route::resource('category', 'CategoryController')->middleware('permission:spartpart.index');

    /**
     * Inventory
     */
    Route::resource('inventory', 'InventoryController')->middleware('permission:inventory.index');
    Route::get('excel/inventory', 'InventoryController@downloadExcel')->name('excel/inventory')->middleware('permission:inventory.index');
    Route::get('pdf/inventory', 'InventoryController@downloadPdf')->name('pdf/inventory')->middleware('permission:inventory.index');

    /**
     * Supplier
     */
    Route::resource('supplier', 'SupplierController')->middleware('permission:supplier.index');

    /** 
     * Customer
     */
    Route::resource('customer', 'CustomerController')->middleware('permission:customer.index');
    Route::get('excel/customer', 'CustomerController@downloadExcel')->name('excel/customer')->middleware('permission:customer.index');
    Route::get('pdf/customer', 'CustomerController@downloadPdf')->name('pdf/customer')->middleware('permission:customer.index');
    

    /**
     * Equipment Sold
     */
    Route::resource('equipmentsold', 'EquipmentSoldController')->middleware('permission:equipmentsold.index');

    /**
     * Transaction
     */
    Route::resource('transaction', 'EquipmentSoldController')->middleware('permission:transaction');

    /**
     * Movement & Rent
     */
    Route::resource('movement', 'MovementController')->middleware('permission:movement.index');

    /**
     * Revenue
     */
    Route::resource('revenue', 'RevenueController')->middleware('permission:revenue.index');

    /**
     * Maintenance
     */
    Route::resource('maintenance', 'MaintenanceController')->middleware('permission:maintenance.index');
   
    /**
     * Staff
     */
    Route::resource('staff', 'StaffController')->middleware('permission:staff.index');

    /**
     * Claim Invoice
     */
    Route::resource('claim', 'ClaimInvoiceController');

    /**
     * UnClaim Invoice
     */
    Route::resource('unclaim', 'UnclaimInvoiceController');
   

});


/**
 * Installation
 */

Route::group(['prefix' => 'install'], function () {
    Route::get('/', 'InstallController@index')->name('install.start');
    Route::get('requirements', 'InstallController@requirements')->name('install.requirements');
    Route::get('permissions', 'InstallController@permissions')->name('install.permissions');
    Route::get('database', 'InstallController@databaseInfo')->name('install.database');
    Route::get('start-installation', 'InstallController@installation')->name('install.installation');
    Route::post('start-installation', 'InstallController@installation')->name('install.installation');
    Route::post('install-app', 'InstallController@install')->name('install.install');
    Route::get('complete', 'InstallController@complete')->name('install.complete');
    Route::get('error', 'InstallController@error')->name('install.error');
});
