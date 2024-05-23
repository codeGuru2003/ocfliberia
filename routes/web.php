<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BeneficiaryController;
use App\Http\Controllers\CountyTypeController;
use App\Http\Controllers\DistributionBeneficiaryController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\DistributionTypeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;


//Home Routes
Route::controller(HomeController::class)->group(function(){
    Route::get('/','dashboard')->name('home.dashboard')->middleware('auth')->can('view-dashboard');
});

//Roles Routes
Route::controller(RoleController::class)->group(function(){
    Route::get('roles','index')->name('roles.index')->middleware('auth')->can('manage-roles');
    Route::get('roles/create','create')->name('roles.create')->middleware('auth')->can('add-role');
    Route::post('roles/create','store')->name('roles.store')->middleware('auth')->can('add-role');
    Route::get('roles/edit/{id}','edit')->name('roles.edit')->middleware('auth')->can('edit-role');
    Route::post('roles/edit/{id}','update')->name('roles.update')->middleware('auth')->can('edit-role');
    Route::get('roles/delete/{id}','destroy')->name('roles.delete')->middleware('auth')->can('delete-role');
    Route::get('roles/details/{id}','details')->name('roles.details')->middleware('auth')->can('view-role-details');
});


//Roles Routes
Route::controller(PermissionController::class)->group(function(){
    Route::get('permissions','index')->name('permissions.index')->middleware('auth')->can('manage-permissions');
    Route::get('permissions/create','create')->name('permissions.create')->middleware('auth')->can('add-permission');
    Route::post('permissions/create','store')->name('permissions.store')->middleware('auth')->can('add-permission');
    Route::get('permissions/edit/{id}','edit')->name('permissions.edit')->middleware('auth')->can('edit-permission');
    Route::post('permissions/edit/{id}','update')->name('permissions.update')->middleware('auth')->can('edit-permission');
    Route::get('permissions/delete/{id}','destroy')->name('permissions.delete')->middleware('auth')->can('delete-permission');
});

//Account Routes
Route::controller(AccountController::class)->group(function(){
    Route::get('account/users', 'users')->name('account.users')->can('manage-users');
    Route::get('account/register', 'register')->name('account.register')->can('add-user');
    Route::get('account/users/{id}','edit')->name('account.edit')->can('edit-user');
    Route::post('account/users/{id}','update')->name('account.update')->can('edit-user');
    Route::get('account/details/{id}','details')->name('account.details')->can('view-user-details');
    Route::post('account/register','store')->name('account.store')->middleware('auth')->can('add-user');
    Route::get('account/delete/{id}','destroy')->name('account.destroy')->middleware('auth')->can('delete-user');
    Route::get('login', 'login')->name('login');
    Route::post('login','authenticate')->name('authenticate');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
    Route::get('change_password','changepassword')->name('change.password')->middleware('auth');
    Route::post('change_password','updatePassword')->name('update.password')->middleware('auth');
});

//CountyTypes Routes
Route::controller(CountyTypeController::class)->group(function(){
    Route::get('counties','index')->name('counties.index')->middleware('auth')->can('manage-county-types');
    Route::get('counties/create','create')->name('counties.create')->middleware('auth')->can('add-county-type');
    Route::post('counties/create','store')->name('counties.store')->middleware('auth')->can('add-county-type');
    Route::get('counties/edit/{id}','edit')->name('counties.edit')->middleware('auth')->can('edit-county-type');
    Route::post('counties/edit/{id}','update')->name('counties.update')->middleware('auth')->can('edit-county-type');
    Route::get('counties/destroy/{id}','destroy')->name('counties.destroy')->middleware('auth')->can('delete-county-type');
});

//Distribution Type Routes
Route::controller(DistributionTypeController::class)->group(function(){
    Route::get('distributiontypes','index')->name('distributiontypes.index')->middleware('auth')->can('manage-distribution-types');
    Route::get('distributiontypes/create','create')->name('distributiontypes.create')->middleware('auth')->can('add-distribution-type');
    Route::post('distributiontypes/create','store')->name('distributiontypes.store')->middleware('auth')->can('add-distribution-type');
    Route::get('distributiontypes/edit/{id}','edit')->name('distributiontypes.edit')->middleware('auth')->can('edit-distribution-type');
    Route::post('distributiontypes/edit/{id}','update')->name('distributiontypes.update')->middleware('auth')->can('edit-distribution-type');
    Route::get('distributiontypes/destroy/{id}','destroy')->name('distributiontypes.destroy')->middleware('auth')->can('delete-distribution-type');
});

//Sponsor Routes
Route::controller(SponsorController::class)->group(function(){
    Route::get('sponsors','index')->name('sponsors.index')->middleware('auth')->can('manage-sponsors');
    Route::get('sponsors/create','create')->name('sponsors.create')->middleware('auth')->can('add-sponsor');
    Route::post('sponsors/create','store')->name('sponsors.store')->middleware('auth')->can('add-sponsor');
    Route::get('sponsors/edit/{id}','edit')->name('sponsors.edit')->middleware('auth')->can('edit-sponsor');
    Route::post('sponsors/edit/{id}','update')->name('sponsors.update')->middleware('auth')->can('edit-sponsor');
    Route::get('sponsors/destroy/{id}','destroy')->name('sponsors.destroy')->middleware('auth')->can('delete-sponsor');
});

//School Routes
Route::controller(SchoolController::class)->group(function(){
    Route::get('schools','index')->name('schools.index')->middleware('auth')->can('manage-schools');
    Route::get('schools/create','create')->name('schools.create')->middleware('auth')->can('add-school');
    Route::post('schools/create','store')->name('schools.store')->middleware('auth')->can('add-school');
    Route::get('schools/edit/{id}','edit')->name('schools.edit')->middleware('auth')->can('edit-school');
    Route::post('schools/edit/{id}','update')->name('schools.update')->middleware('auth')->can('edit-school');
    Route::get('schools/destroy/{id}','destroy')->name('schools.destroy')->middleware('auth')->can('delete-school');
});

//Beneficiary Routes
Route::controller(BeneficiaryController::class)->group(function(){
    Route::get('beneficiaries','index')->name('beneficiaries.index')->middleware('auth')->can('manage-students');
    Route::get('beneficiaries/create','create')->name('beneficiaries.create')->middleware('auth')->can('add-student');
    Route::post('beneficiaries/create','store')->name('beneficiaries.store')->middleware('auth')->can('add-student');
    Route::get('beneficiaries/details/{id}','details')->name('beneficiaries.details')->middleware('auth')->can('view-student-details');
    Route::get('beneficiaries/edit/{id}','edit')->name('beneficiaries.edit')->middleware('auth')->can('edit-student');
    Route::post('beneficiaries/edit/{id}','update')->name('beneficiaries.update')->middleware('auth')->can('edit-student');
    Route::get('beneficiaries/destroy/{id}','destroy')->name('beneficiaries.destroy')->middleware('auth')->can('delete-student');
    Route::get('beneficiaries/get-beneficiaries','getBeneficiaries')->name('getBeneficiaries')->middleware('auth');
    Route::get('beneficiaries/get-project-beneficiaries','getProjectBeneficiaries')->name('getProjectBeneficiaries')->middleware('auth');
});

//Visit Routes
Route::controller(VisitController::class)->group(function(){
    Route::get('visits','index')->name('visits.index')->middleware('auth')->can('manage-visits');
    Route::get('visits/create','create')->name('visits.create')->middleware('auth')->can('add-visit');
    Route::post('visits/create','store')->name('visits.store')->middleware('auth')->can('add-visit');
    Route::get('visits/details/{id}','details')->name('visits.details')->middleware('auth')->can('view-visit-details');
    Route::get('visits/edit/{id}','edit')->name('visits.edit')->middleware('auth')->can('edit-visit');
    Route::post('visits/edit/{id}','update')->name('visits.update')->middleware('auth')->can('edit-visit');
    Route::get('visits/destroy/{id}','destroy')->name('visits.destroy')->middleware('auth')->can('delete-visit');
});

//Distributions Routes
Route::controller(DistributionController::class)->group(function(){
    Route::get('distributions','index')->name('distributions.index')->middleware('auth')->can('manage-distributions');
    Route::get('distributions/create','create')->name('distributions.create')->middleware('auth')->can('add-distribution');
    Route::post('distributions/create','store')->name('distributions.store')->middleware('auth')->can('add-distribution');
    Route::get('distributions/details/{id}','details')->name('distributions.details')->middleware('auth')->can('view-distribution-details');
    Route::get('distributions/edit/{id}','edit')->name('distributions.edit')->middleware('auth')->can('edit-distribution');
    Route::post('distributions/edit/{id}','update')->name('distributions.update')->middleware('auth')->can('edit-distribution');
    Route::get('distributions/destroy/{id}','destroy')->name('distributions.destroy')->middleware('auth')->can('delete-distribution');
});


//Distribution Beneficiaries
Route::controller(DistributionBeneficiaryController::class)->group(function(){
    Route::get('distribution-beneficiaries','index')->name('distribution.beneficiaries')->middleware('auth')->can('view-distribution-report');
    Route::get('distribution-beneficiaries/pdf','viewPdf')->name('distribution.beneficiaries.pdf')->middleware('auth')->can('export-distribution-report');
});

//Report Routes
Route::controller(ReportController::class)->group(function(){
    Route::get('reports/students','students')->name('reports.students')->middleware('auth')->can('view-student-report');
    Route::get('reports/distributions','distributions')->name('reports.distributions')->middleware('auth')->can('view-distribution-report');
    Route::get('reports/visits','visits')->name('reports.visits')->middleware('auth')->can('view-visits-report');
    Route::get('reports/sponsors','sponsors')->name('reports.sponsors')->middleware('auth')->can('view-sponsors-report');
});
