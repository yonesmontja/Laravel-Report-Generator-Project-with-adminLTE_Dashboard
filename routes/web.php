<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Report Categories Routes
Route::get('reports', [ReportController::class, 'index'])->name('reports');
Route::get('report/create', [ReportController::class, 'create'])->name('report.create');
Route::put('report/create', [ReportController::class, 'store'])->name('report.store');
Route::get('report/edit/{report}', [ReportController::class, 'edit'])->name('report.edit');
Route::put('report/update/{report}', [ReportController::class, 'update'])->name('report.update');
Route::get('delete/{report}/', [ReportController::class, 'destroy'])->name('report.delete');

// Report Types Routes
Route::get('report/types', [ReportController::class, 'typeIndex'])->name('reports.types');
Route::get('report/type/create', [ReportController::class, 'typeCreate'])->name('report.type.create');
Route::put('report/type/create', [ReportController::class, 'typeStore'])->name('report.type.store');
Route::get('report/type/edit/{type}', [ReportController::class, 'typeEdit'])->name('report.type.edit');
Route::put('report/type/update/{type}', [ReportController::class, 'typeUpdate'])->name('report.type.update');
Route::get('report/type/delete/{type}', [ReportController::class, 'typeDestroy'])->name('report.type.delete');

// Report Data Routes
Route::get('reports/data/show', [ReportController::class, 'dataShow'])->name('reports.data.show');
Route::get('reports/data/index', [ReportController::class, 'dataIndex'])->name('report.data.index');
Route::put('reports/data/index', [ReportController::class, 'dataStore'])->name('report.data.store');
Route::get('reports/data/edit/{data}', [ReportController::class, 'dataEdit'])->name('report.data.edit');
Route::put('reports/data/update/{data}', [ReportController::class, 'dataUpdate'])->name('report.data.update');
Route::get('reports/data/delete/{data}', [ReportController::class, 'dataDestroy'])->name('report.data.delete');
