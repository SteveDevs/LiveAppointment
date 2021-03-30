<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
//use App\Http\Livewire\Auth\Client\LoginClient;
//use App\Http\Livewire\Auth\Employee\EmployeeLogin;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
//use App\Http\Livewire\Auth\Client\RegisterClient;
//use App\Http\Livewire\Auth\Employee\RegisterEmployee;

use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Admin\Appointments\TableAppointment;
use App\Http\Livewire\Admin\Appointments\CreateAppointment;
use App\Http\Livewire\Admin\Appointments\EditAppointment;

use App\Http\Livewire\ProfileComponent;

use App\Http\Livewire\Admin\Clients\CreateClient;
use App\Http\Livewire\Admin\Clients\EditClient;
use App\Http\Livewire\Admin\Clients\TableClient;
use App\Http\Livewire\Admin\Clients\ClientAppointments;


use App\Http\Livewire\Admin\Employees\CreateEmployee;
use App\Http\Livewire\Admin\Employees\EditEmployee;
use App\Http\Livewire\Admin\Employees\TableEmployee;
use App\Http\Livewire\Admin\Employees\EmployeeAppointments;

use App\Http\Livewire\Admin\Permissions\CreatePermission;
use App\Http\Livewire\Admin\Permissions\EditPermission;
use App\Http\Livewire\Admin\Permissions\TablePermission;

use App\Http\Livewire\Admin\Roles\CreateRole;
use App\Http\Livewire\Admin\Roles\EditRole;
use App\Http\Livewire\Admin\Roles\TableRole;

use App\Http\Livewire\Admin\Services\CreateService;
use App\Http\Livewire\Admin\Services\EditService;
use App\Http\Livewire\Admin\Services\TableService;

use App\Http\Livewire\Admin\Users\CreateUser;
use App\Http\Livewire\Admin\Users\EditUser;
use App\Http\Livewire\Admin\Users\TableUser;

use App\Http\Livewire\Admin\EmployeeCategories\TableEmployeeCategory;
use App\Http\Livewire\Admin\Settings\EditSettings;

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Profile;
use Illuminate\Support\Facades\Route;


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

Route::group(
    [
        'prefix'     => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::get('/', function () {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        return redirect('login');
    })->name('home');

    Route::middleware('guest')->group(function () {
        Route::get('login', Login::class)
        ->name('login');

        Route::get('register', Register::class)
        ->name('register');
    });

    Route::get('password/reset', Email::class)
    ->name('password.request');

    Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

    Route::middleware('auth')->group(function () {
        Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

        Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
    });

    Route::middleware('auth')->group(function () {
        Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

        Route::post('logout', LogoutController::class)
        ->name('logout');

        Route::get('/dashboard', Dashboard::class)->name('dashboard')->middleware('can:employee_access');

        Route::get('/profile', ProfileComponent::class)->name('profile')->middleware('can:employee_access');

        
        Route::get('/admin/appointments', TableAppointment::class)->name('admin.appointments')->middleware('can:appointment_access');
        Route::get('/admin/appointments/create', CreateAppointment::class)->name('admin.appointments.create')->middleware('can:appointment_create');
        Route::get('/admin/appointments/edit/{id}', EditAppointment::class)->name('admin.appointments.edit')->middleware('can:appointment_edit');
        
        Route::get('/admin/employee-categories', TableEmployeeCategory::class)->name('admin.employee-categories')->middleware('can:employee_category_access');

        Route::get('/admin/clients', TableClient::class)->name('admin.clients')->middleware('can:client_access');
        Route::get('/admin/clients/create', CreateClient::class)->name('admin.clients.create')->middleware('can:client_create');
        Route::get('/admin/clients/edit/{id}', EditClient::class)->name('admin.clients.edit')->middleware('can:client_edit');

        Route::get('/admin/roles', TableRole::class)->name('admin.roles')->middleware('can:role_access');
        Route::get('/admin/roles/create', CreateRole::class)->name('admin.roles.create')->middleware('can:role_create');
        Route::get('/admin/roles/edit/{id}', EditRole::class)->name('admin.roles.edit')->middleware('can:role_edit');

        Route::get('/admin/employees', TableEmployee::class)->name('admin.employees')->middleware('can:employee_access');
        Route::get('/admin/employees/create', CreateEmployee::class)->name('admin.employees.create')->middleware('can:employee_create');
        Route::get('/admin/employees/edit/{id}', EditEmployee::class)->name('admin.employees.edit')->middleware('can:employee_edit');

        Route::get('/admin/employees/appointments/{id}/{employee_id}/{start_of_month}', EmployeeAppointments::class)->name('admin.employees.appointments');

        Route::get('/admin/employees/appointments/{employee_id}', EmployeeAppointments::class)->name('admin.employees.appointments')->middleware('can:employee_appointments');

        Route::get('/admin/clients/{id}/{client_id}/{star_appointmentst_of_month}', ClientAppointments::class)->name('admin.clients.appointments');

        Route::get('/admin/clients/appointments/{client_id}', ClientAppointments::class)->name('admin.clients.appointments')->middleware('can:client_appointments');

        Route::get('/admin/permissions', TablePermission::class)->name('admin.permissions')->middleware('can:permission_access');
        Route::get('/admin/permissions/create', CreatePermission::class)->name('admin.permissions.create')->middleware('can:permission_create');
        Route::get('/admin/permissions/edit/{id}', EditPermission::class)->name('admin.permissions.edit')->middleware('can:permission_edit');

        Route::get('/admin/services', TableService::class)->name('admin.services')->middleware('can:service_access');
        Route::get('/admin/services/create', CreateService::class)->name('admin.services.create')->middleware('can:service_create');
        Route::get('/admin/services/edit/{id}', EditService::class)->name('admin.services.edit')->middleware('can:service_edit');

        Route::get('/admin/users', TableUser::class)->name('admin.users')->middleware('can:user_access');
        Route::get('/admin/users/create', CreateUser::class)->name('admin.users.create')->middleware('can:user_create');
        Route::get('/admin/users/edit/{id}', EditUser::class)->name('admin.users.edit')->middleware('can:user_edit');

        Route::get('/admin/settings', EditSettings::class)->name('admin.settings.edit')->middleware('can:setting_edit');
    });
});


