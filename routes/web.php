<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdditionalController;
use App\Http\Controllers\AdditionalReportController;
use App\Http\Controllers\CategoryItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ItemsManagementController;
use App\Http\Controllers\EntryLetterController;
use App\Http\Controllers\HumanManagement;
use App\Http\Controllers\ItemBrandController;
use App\Http\Controllers\ItemDetailController;
use App\Http\Controllers\ItemGroupController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LaporanKinerjaController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\OutgoingLetterController;
use App\Http\Controllers\PerformanceReportController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SourceIncomeController;
use App\Http\Controllers\SuppliersController;

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

Route::group(['middleware' => ['web', 'guest']], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/profile/{id}/index', [ProfileController::class, 'index']);
    Route::get('/profile/{id}/settings', [ProfileController::class, 'setting']);
    Route::put('/profile/{id}/settings', [ProfileController::class, 'change']);

    Route::post('/users/import', [UserController::class, 'import'])->name('users.import');
    Route::post('/users/export', [UserController::class, 'export'])->name('users.export');
    Route::resource('users', UserController::class);
    Route::resource('leaders', LeaderController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::resource('reports', LaporanKinerjaController::class);
    Route::post('/positions/import', [PositionController::class, 'import'])->name('positions.import');
    Route::post('/positions/export', [PositionController::class, 'export'])->name('positions.export');
    Route::resource('positions', PositionController::class);
    Route::get('outgoing-letters/{outgoing_letter}/pdf', [OutgoingLetterController::class, 'pdf'])->name('outgoing-letters.pdf');
    Route::resource('outgoing-letters', OutgoingLetterController::class);
    Route::resource('entry-letters', EntryLetterController::class)->except('update');
    Route::get('/performance-reports/archive', [PerformanceReportController::class, 'archive'])->name('performance-reports.archive');
    Route::resource('performance-reports', PerformanceReportController::class);
    Route::resource('activities', ActivityController::class);
    Route::delete('additional-reports/{additional_report}', [AdditionalReportController::class, 'destroy'])->name('additional-reports.destroy');
    Route::delete('additionals/{additional}', [AdditionalController::class, 'destroy'])->name('additionals.destroy');

    Route::resource('assets', ItemsManagementController::class);
    Route::resource('logistics', LogisticController::class);
    Route::resource('suppliers', SuppliersController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('sourceincome', SourceIncomeController::class);

    Route::resource('itemgroups', ItemGroupController::class);
    Route::resource('itemtypes', ItemTypeController::class);
    Route::resource('itemcategories', CategoryItemController::class);

    Route::resource('itemdetails', ItemDetailController::class);
    Route::resource('itembrands', ItemBrandController::class);


    Route::resource('employees', EmployeesController::class);
});
