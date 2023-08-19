<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TlController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PsfController;
use App\Http\Controllers\JobCardController;

use Illuminate\Support\Facades\Auth;
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
    return view('auth/login');
});

Route::get('/logout-value', function () {

     session()->flush();
     return redirect('/');
});

Auth::routes();

Route::get('job-card-report', [JobCardController::class, 'jobCard']);
Route::get('suggestion', [JobCardController::class, 'jobCardSuggestion']);
Route::post('job-card-report-get', [JobCardController::class, 'jobCardHistory'])->name('job-card-report-get');


Route::get('psf-report',[PsfController::class, 'psfReport'])->name('psf-report');
Route::get('get-psf-data',[PsfController::class, 'getPsfData'])->name('get-psf-data');
Route::any('psf-data-report',[PsfController::class, 'psfDataReport'])->name('psf-data-report');
Route::any('customer-query-update',[PsfController::class, 'customerQueryUpdate'])->name('customer-query-update');

Route::get('/complaint-list', [ComplaintController::class, 'complaintList'])->name('complaint-list');
Route::get('/create-complaint', [ComplaintController::class, 'index'])->name('create-complaint');
Route::get('update-complaint/{id}', [ComplaintController::class, 'updateComplaint'])->name('update-complaint.updateComplaint');
Route::get('/search-report',[ComplaintController::class, 'complaintListBySearch'])->name('search-report');
Route::post('/search-data-report',[ComplaintController::class, 'complaintListJobCard'])->name('search-data-report');


Route::get('pre-stage-reason',[MasterController::class, 'preStageReason'])->name('pre-stage-reason');
Route::get('post-approval-stage',[MasterController::class, 'postStageReason'])->name('post-approval-stage');
Route::get('repair-stage-reason',[MasterController::class, 'repairStageReason'])->name('repair-stage-reason');
Route::get('reason-get-data',[MasterController::class, 'reasonGetData'])->name('reason-get-data');
Route::get('add-reason',[MasterController::class, 'addReason'])->name('add-reason');
Route::post('save-reason', [MasterController::class, 'saveReason'])->name('save-reason');
Route::get('delete-reason', [MasterController::class, 'deleteReason'])->name('delete-reason');
Route::get('edit-reason',[MasterController::class, 'editReason'])->name('edit-reason');
Route::post('update-reason', [MasterController::class, 'updateReason'])->name('update-reason');


Route::get('major-minor-tat',[MasterController::class, 'majorMinorTat'])->name('major-minor-tat');
Route::get('get-major-minor-tat',[MasterController::class, 'getmajorMinorTat'])->name('major-minor-tat');
Route::get('add-tat',[MasterController::class, 'addTat'])->name('add-tat');
Route::post('save-tat', [MasterController::class, 'saveTat'])->name('save-tat');
Route::get('edit-tat',[MasterController::class, 'editTat'])->name('edit-tat');
Route::post('update-tat', [MasterController::class, 'updateTat'])->name('update-tat');
Route::get('delete-tat', [MasterController::class, 'deleteTat'])->name('delete-tat');


Route::get('/get-data', [ComplaintController::class, 'getData'])->name('get-data');
Route::post('/store-form', [ComplaintController::class, 'storeForm'])->name('store-form');
Route::get('/update-case/{id}', [ComplaintController::class, 'updateCase'])->name('update-case');
Route::get('jobcard-delete/{id}', [ComplaintController::class, 'jobcardDelete'])->name('jobcard-delete.jobcardDelete');
Route::get('/get-remarks-data', [ComplaintController::class, 'getRemarksData'])->name('get-remarks-data');
Route::get('/recycle-data', [ComplaintController::class, 'recycleData'])->name('recycle-data');


Route::get('/admin/teamleader', [AdminController::class, 'teamleader'])->name('teamleader');
Route::get('/admin/uploadcase', [AdminController::class, 'uploadcase'])->name('uploadcase');
Route::post('/admin/submitUpload', [AdminController::class, 'submitUpload'])->name('submitUpload');


Route::get('/team-leader/agent', [TlController::class, 'agent'])->name('agent');
Route::post('/team-leader/store', [TlController::class, 'store'])->name('agent-store');
Route::get('/team-leader/destroy-agent/{id}', [TlController::class, 'destroy'])->name('destroy-agent');

Route::resource('/admin', AdminController::class);
Route::resource('/team-leader', TlController::class);


Route::get('/ams-export-file', [ReportController::class, 'view'])->name('ams-export-file');
Route::get('/ams-export', [ReportController::class, 'index'])->name('ams.export');