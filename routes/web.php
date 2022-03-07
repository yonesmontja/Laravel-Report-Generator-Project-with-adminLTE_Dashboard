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
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Report Categories Routes
Route::get('reports', [ReportController::class, 'index'])->name('reports');
Route::get('report/create', [ReportController::class, 'create'])->name('report.create');
Route::put('report/create', [ReportController::class, 'store'])->name('report.store');
Route::get('report/edit/{report}', [ReportController::class, 'edit'])->name('report.edit');
Route::put('report/update/{report}', [ReportController::class, 'update'])->name('report.update');
Route::get('delete/{report}/', [ReportController::class, 'destroy'])->name('report.delete');

// Report Types Routes
Route::get('report/fields', [ReportController::class, 'typeIndex'])->name('reports.types');
Route::get('report/field/create', [ReportController::class, 'typeCreate'])->name('report.type.create');
Route::put('report/field/create', [ReportController::class, 'typeStore'])->name('report.type.store');
Route::get('report/field/edit/{type}', [ReportController::class, 'typeEdit'])->name('report.type.edit');
Route::put('report/field/update/{type}', [ReportController::class, 'typeUpdate'])->name('report.type.update');
Route::get('report/field/delete/{type}', [ReportController::class, 'typeDestroy'])->name('report.type.delete');

// Report Data Routes
Route::get('reports/data/show', [ReportController::class, 'dataShow'])->name('reports.data.show');
Route::get('reports/data/index', [ReportController::class, 'dataIndex'])->name('report.data.index');
Route::put('report/data/index', [ReportController::class, 'dataStore'])->name('report.data.store');
Route::get('report/data/delete/{data}', [ReportController::class, 'dataDestroy'])->name('report.data.delete');

// Report Template Routes
Route::get('report/templates', [ReportController::class, 'templateIndex'])->name('report.templates.index');
Route::put('report/template', [ReportController::class, 'templateStore'])->name('report.template.store');
Route::get('report/template/{template}', [ReportController::class, 'templateDestroy'])->name('report.template.delete');
Route::get('report/view-report/{templateName}/{data}/{isChineseEnabled}', [ReportController::class, 'viewReport'])->name('view-report');
/* Whenever this route is called, it must follow the given end point url with three values in place of given variables.
** Then 'view-report' ROUTE / URL will be invoked from 'data.show' view.
** And the values from URL will be passed to viewReport() in controller.
** Then viewReport() will return the view dynamically as 'templates.all-templates.{templateName}'.
*/