<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest'); // Only the guest can access this login page.

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

// Report Categories Routes
Route::get('reports', [ReportController::class, 'index'])->name('reports')->middleware('auth');
Route::get('report/create', [ReportController::class, 'create'])->name('report.create')->middleware('auth');
Route::put('report/create', [ReportController::class, 'store'])->name('report.store')->middleware('auth');
Route::get('report/edit/{report}', [ReportController::class, 'edit'])->name('report.edit')->middleware('auth');
Route::put('report/update/{report}', [ReportController::class, 'update'])->name('report.update')->middleware('auth');
Route::get('delete/{report}/', [ReportController::class, 'destroy'])->name('report.delete')->middleware('auth');

// Report Types Routes
Route::get('report/fields', [ReportController::class, 'typeIndex'])->name('reports.types')->middleware('auth');
Route::get('report/field/create', [ReportController::class, 'typeCreate'])->name('report.type.create')->middleware('auth');
Route::put('report/field/create', [ReportController::class, 'typeStore'])->name('report.type.store')->middleware('auth');
Route::get('report/field/edit/{type}', [ReportController::class, 'typeEdit'])->name('report.type.edit')->middleware('auth');
Route::put('report/field/update/{type}', [ReportController::class, 'typeUpdate'])->name('report.type.update')->middleware('auth');
Route::get('report/field/delete/{type}', [ReportController::class, 'typeDestroy'])->name('report.type.delete')->middleware('auth');

// Report Data Routes
Route::get('reports/data/show', [ReportController::class, 'dataShow'])->name('reports.data.show')->middleware('auth');
Route::get('reports/data/index', [ReportController::class, 'dataIndex'])->name('report.data.index')->middleware('auth');
Route::put('report/data/index', [ReportController::class, 'dataStore'])->name('report.data.store')->middleware('auth');
Route::get('report/data/delete/{data}', [ReportController::class, 'dataDestroy'])->name('report.data.delete')->middleware('auth');

// Report Template Routes
Route::get('report/templates', [ReportController::class, 'templateIndex'])->name('report.templates.index')->middleware('auth');
Route::put('report/template', [ReportController::class, 'templateStore'])->name('report.template.store')->middleware('auth');
Route::get('report/template/{template}', [ReportController::class, 'templateDestroy'])->name('report.template.delete')->middleware('auth');

Route::get('report/view-report/{templateName}/{data}/{isChineseEnabled}', [ReportController::class, 'viewReport'])->name('view-report')->middleware('auth');
/* Whenever this route is called, it must follow the given end point url with three values in place of given variables.
** Then 'view-report' ROUTE / URL will be invoked from 'data.show' view.
** And the values from URL will be passed to viewReport() in controller.
** Then viewReport() will return the view dynamically as 'templates.all-templates.{templateName}'.
*/