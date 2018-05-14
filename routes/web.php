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
    return view('dashboard');
})->middleware('auth');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
// Route::get('/system-management/{option}', 'SystemMgmtController@index');
Route::get('/profile', 'ProfileController@index');

Route::resource('user-management/user', 'UserController');
Route::post('user-management/user/search', 'UserController@search')->name('user.search');

Route::resource('user-management/role', 'RoleController');
Route::post('user-management/role/search', 'RoleController@search')->name('role.search');

Route::post('user-management/search', 'UserManagementController@search')->name('user-management.search');
Route::resource('user-management', 'UserManagementController');

Route::resource('employee-management', 'EmployeeManagementController');
Route::post('employee-management/search', 'EmployeeManagementController@search')->name('employee-management.search');

Route::resource('task-management', 'TaskController');
Route::post('task-management/search', 'TaskController@search')->name('task-management.search');

Route::resource('nptask-management', 'NPTaskController');
Route::post('nptask-management/search', 'NPTaskController@search')->name('nptask-management.search');

Route::resource('system-management/department', 'DepartmentController');
Route::post('system-management/department/search', 'DepartmentController@search')->name('department.search');

Route::resource('system-management/division', 'DivisionController');
Route::post('system-management/division/search', 'DivisionController@search')->name('division.search');

Route::resource('system-management/country', 'CountryController');
Route::post('system-management/country/search', 'CountryController@search')->name('country.search');

Route::resource('system-management/state', 'StateController');
Route::post('system-management/state/search', 'StateController@search')->name('state.search');

Route::resource('system-management/city', 'CityController');
Route::post('system-management/city/search', 'CityController@search')->name('city.search');

Route::resource('timesheet-management', 'TimesheetController');
Route::post('timesheet-management/search', 'TimesheetController@search')->name('timesheet-management.search');
Route::resource('nptimesheet-management', 'NPTimesheetController');
Route::post('nptimesheet-management/search', 'NPTimesheetController@search')->name('nptimesheet-management.search');

Route::get('system-management/report', 'ReportController@index');
Route::post('system-management/report/search', 'ReportController@search')->name('report.search');
Route::post('system-management/report/excel', 'ReportController@exportExcel')->name('report.excel');
Route::post('system-management/report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::get('avatars/{name}', 'EmployeeManagementController@load');

Route::resource('system-management/client', 'ClientController');
Route::post('system-management/client/search', 'ClientController@search')->name('client.search');

Route::post('category/search', 'CategoryController@search')->name('category.search');
Route::resource('category', 'CategoryController');

Route::resource('code', 'CodeController');
Route::post('code/search', 'CodeController@search')->name('code.search');

Route::resource('project', 'ProjectController');
Route::post('project/search', 'ProjectController@search')->name('project.search');
Route::post('project/pdf', 'ProjectController@exportPDF')->name('project.pdf');