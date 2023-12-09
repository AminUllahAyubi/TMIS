<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupervisorController;
use App\Models\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home.index');
// });

// home.index page routes
Route::get('/',[ThesisController::class,'index'])->name('home.index');
//          home.index search bar related route

  
// report generation related routes
// announcedThesis
Route::get('generate-pdf', [PDFController::class, 'generatePDFofAnnouncedThesis'])->name('announcedThesisPDF');



// home directory(page) search bar and view thesis related route
Route::get('tmis/searchThesis',[ThesisController::class,'searchThesis'])->name('home.search');
Route::get('tmis/viewThesis/id={id}',[ThesisController::class,'viewThesis'])->name('home.view');
Route::get('tmis/filterThesis/name={name}',[ThesisController::class,'filterThesis'])->name('home.filterThesis');

//                                this route download the thesis and proposal in the admin panel view page
Route::get('tmis/downloadThesisProposal/id={id}',[ThesisController::class,'downloadProposal'])->name('downloadProposal');
Route::get('tmis/downloadThesisBook/id={id}',[ThesisController::class,'downloadBook'])->name('downloadBook');

// admin page routes
// loginRoute
Route::get('/tmis/adminLogin',[AdminController::class,'adminLogin']);
// Route::get('/tmis/adminLogin',[AuthenticatedSessionController::class,'create']);

// admin dashboard view related route
Route::get('/tmis/admin',[AdminController::class,'index'])->name('admin.index');
Route::get('/tmis/admin/viewThesis/id={id}',[AdminController::class,'viewThesis'])->name('admin.view');
Route::post('/tmis/admin/filterThesis',[AdminController::class,'filterThesis'])->name('admin.filterThesis');
Route::get('/tmis/admin/searchThesis',[AdminController::class,'searchThesis'])->name('admin.search');
Route::get('/tmis/admin/groupBy/type={type}',[AdminController::class,'groupByTypeThesis'])->name('admin.groupBy');
Route::get('/tmis/admin/viewThesisGroupBy/id={id}',[AdminController::class,'groupByTypeThesis'])->name('admin.groupBy');
Route::get('/tmis/admin/viewGroupDetails/id={id}',[GroupController::class,'viewGroupDetails'])->name('admin.groupDetails');


                                // admin page delete thesis button routes
Route::get('tmis/admin/deletePublishedThesis/id={id}',[AdminController::class,'deletePublishedThesis'])->name('admin.deletePublishedThesis');


// admin panel thesis page related routes
Route::get('/tmis/admin/addThesis',[ThesisController::class,'createThesis'])->name('admin.createThesis');
Route::post('tmis/admin/storeThesis',[ThesisController::class,'storeThesis'])->name('admin.storeThesis');
Route::get('tmis/admin/publishedThesises',[ThesisController::class,'publishedThesises'])->name('admin.publishedThesises');
            // admin panel thesis page anncounced thesis related routes
Route::get('tmis/admin/announcedThesises',[ThesisController::class,'announcedThesises'])->name('admin.announcedThesises');
Route::get('tmis/admin/deleteAnnouncedThesis/thesisId={id}',[ThesisController::class,'deleteAnnouncedThesis'])->name('admin.deleteAnnouncedThesis');
Route::get('tmis/admin/editAnnouncedThesis/thesisId={id}',[ThesisController::class,'editAnnouncedThesis'])->name('admin.editAnnouncedThesis');
Route::post('tmis/admin/updateAnnouncedThesis/thesisId={id}',[ThesisController::class,'updateAnnouncedThesis'])->name('admin.updateAnnouncedThesis');
            // admin panel publish thesis related routes
Route::get('tmis/admin/publishThesis/thesisId={id}',[ThesisController::class,'publishThesis'])->name('admin.publishThesis');
Route::post('tmis/admin/publishTheThesis/thesisId={id}',[ThesisController::class,'publish'])->name('admin.publish');
            // admin panel submited thesis links route
Route::get('tmis/admin/submitThesises',[ThesisController::class,'submitedThesises'])->name('admin.submitedThesises');
Route::get('tmis/admin/submitThesisToGroup/thesisId={id}',[ThesisController::class,'submitThesisToGroup'])->name('admin.submitThesisToGroup');

// admin page related supervisor page route
    // supervisor
Route::get('/tmis/admin/supervisors',[SupervisorController::class,'supervisor'])->name('admin.supervisor');
Route::post('/tmis/admin/addSupervisor',[SupervisorController::class,'addSupervisor'])->name('admin.addSupervisor');
Route::get('/tmis/admin/editSupervisor/id={id}',[SupervisorController::class,'editSupervisor'])->name('admin.editSupervisor');
Route::post('/tmis/admin/udpateSupervisor/id={id}',[SupervisorController::class,'updateSupervisor'])->name('admin.updateSupervisor');
Route::get('/tmis/admin/viewSupervisorGroups/id={id}',[GroupController::class,'viewSupervisorGroups'])->name('admin.viewSupervisorGroups');

// Route::get('tmis/admin/deleteSupervisor/supervisorId={id}',[SupervisorController::class,'deleteSupervisor'])->name('admin.deleteSupervisor');

// develpment group dropdwon menu student part route
Route::get('tmis/admin/students',[StudentController::class,'student'])->name('admin.student');
Route::post('tmis/admin/addStudent',[StudentController::class,'addStudent'])->name('admin.addStudent');
// Route::get('tmis/admin/deleteStudent/studentId={id}',[StudentController::class,'deleteStudent'])->name('admin.deleteStudent');

// develpment group dropdwon menu group part route
Route::get('tmis/admin/groups',[GroupController::class,'group'])->name('admin.group');
Route::get('tmis/admin/addGroup',[GroupController::class,'addGroup'])->name('admin.addGroup');
Route::post('tmis/admin/storeGroup',[GroupController::class,'storeGroup'])->name('admin.storeGroup');
// Route::get('tmis/admin/editGroup/
//     groupId={id}/
//     thesisId={thesisId}/
//     supervisorId={supervisorId}/
//     firstMemberId={firstMemberId}/
//     secondStudentId={secondMemberId}/
//     thirdStudentId={thirdStudentId}/
//     fourthStudentId={fourthStudentId}'
// ,[GroupController::class,'editGroup'])->name('admin.editGroup');
// Route::post('tmis/admin/updateGroup/groupId={id}',[GroupController::class,'updateGroup'])->name('admin.updateGroup');
Route::get('tmis/admin/deleteGroup/grouptId={id}/thesisId={thesisId}',[GroupController::class,'deleteGroup'])->name('admin.deleteGroup');

// admin profile page related route
Route::get('/tmis/admin/profile',[ProfileController::class,'index'])->name('profile');
Route::post('/tmis/admin/updateProfile/id={id}',[ProfileController::class,'updateProfile'])->name('updateProfile');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
