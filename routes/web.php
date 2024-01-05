<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Exchangecontroller;
use App\Http\Controllers\Partnercontroller;
use App\Http\Controllers\Workshopcontroller;
use App\Http\Controllers\Projectcontroller;
use App\Http\Controllers\Fablabcontroller;
use App\Http\Controllers\Programcontroller;
use App\Http\Controllers\InternshipController;


use App\Http\Controllers\LogController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
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




// Home Controller : Navigate in the Front Office 

Route::get('/',[HomeController::class, 'index']);
Route::get('/exchange_students',[HomeController::class, 'exchange_students']);
Route::get('/students_profiles',[HomeController::class, 'students_profiles']);
Route::get('/faculty_staff_exchange',[HomeController::class, 'faculty_staff_exchange']);
Route::get('/internships',[HomeController::class, 'internships']);
Route::get('/workshop',[HomeController::class, 'workshop']);
Route::get('/research_projects',[HomeController::class, 'research_projects']);
Route::get('/program',[HomeController::class, 'program']);
Route::get('/academic_programs',[HomeController::class, 'academic_programs']);
Route::get('/cultural_programs',[HomeController::class, 'cultural_programs']);
Route::get('/achievements',[HomeController::class, 'achievements']);
Route::get('/partners',[HomeController::class, 'partners']);
// Route::get('/login',[HomeController::class, 'login']);
Route::get('/about',[HomeController::class, 'about']);
Route::get('/news',[HomeController::class, 'news']);

//Internships Controller : Front Office
Route::get('/internships', [InternshipController::class, 'filterInternships'])->name('internships');

//Students Controller : Front Office
Route::get('/students_profiles', [StudentController::class, 'filterStudents'])->name('students_profiles');

//Teachers Controller : Front Office
Route::get('/faculty_staff_exchange', [TeacherController::class, 'filterTeachers'])->name('faculty_staff_exchange');

//Workshops Controller : Front Office
Route::get('/workshop', [WorkshopController::class, 'filterWorkshop'])->name('workshops');

//News Controller : Front Office
Route::get('/news', [NewsController::class, 'displayNews'])->name('front.news.news');
Route::get('/', [NewsController::class, 'index'])->name('front.index');
Route::get('/news/{news:slug}', [NewsController::class, 'showNews'])->name('front.news.showNews');

//Partners Controller : Front Office
Route::get('/partners', [PartnerController::class, 'showPartners'])->name('front.partners.partners');

//Achievements Controller : Front Office
Route::get('/achievements', [FablabController::class, 'showFablabs'])->name('front.achievements.achievements');
Route::get('/achievements/{fablabs:slug}', [FablabController::class, 'displayFablab'])->name('front.achievements.showFablab');

//Programs Controller : Front Office
Route::get('/academic_programs', [ProgramController::class, 'filterAcademicPrograms'])->name('academic_programs');
Route::get('/cultural_programs', [ProgramController::class, 'filterCulturalPrograms'])->name('cultural_programs');

//Projects Controller : Front Office
Route::get('/research_projects', [ProjectController::class, 'showProjects'])->name('front.research_projects.research_projects');
Route::get('/research_projects/{projects:slug}', [ProjectController::class, 'displayProject'])->name('front.research_projects.showProjects');


//Login Controller : Front Office
// Route::get('/login', [LogController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LogController::class, 'login']);

//Search Controller : Front Office
Route::get('/search', [SearchController::class, 'search'])->name('search');




















Route::get('/login',[HomeController::class, 'login'])->name('login');
Route::post('admin.login', [AdminController::class, 'authenticate'])->name('admin.login');
    


Route::group(['middleware' => 'admin.auth'], function () {
    Route::post('admin.logout', [AdminController::class, 'logout'])->name('admin.logout');
    // Admin Controller : Navigate in the back Controller 
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    // Route::get('/exchanges', [AdminController::class, 'exchanges'])->name('exchanges');
    // Route::get('/workshops', [AdminController::class, 'workshops'])->name('workshops');
    // Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    // Route::get('/fablabs', [AdminController::class, 'fablabs'])->name('fablabs');
    // Route::get('/programs', [AdminController::class, 'programs'])->name('programs');


    // Teacher Part 
    Route::get('/teachers', [AdminController::class, 'teachers'])->name('teachers');
    Route::delete('/teacher-deleteRoute/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
    Route::post('teachers.add', [TeacherController::class, 'store'])->name('teachers.add');
    Route::put('/teachers/update/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    // Student Part 

    Route::get('/students', [AdminController::class, 'students'])->name('students');
    Route::delete('/student-deleteRoute/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::post('students.add', [StudentController::class, 'store'])->name('students.add');
    Route::put('/students/update/{student}', [StudentController::class, 'update'])->name('students.update');


    // Exchanges  
    Route::get('/exchanges', [AdminController::class, 'exchanges'])->name('exchanges');
    Route::delete('/exchange-deleteRoute/{exchange}', [Exchangecontroller::class, 'destroy'])->name('exchanges.destroy');
    Route::post('exchanges.add', [Exchangecontroller::class, 'store'])->name('exchanges.add');
    Route::put('/exchanges/update/{exchange}', [ExchangeController::class, 'update'])->name('exchanges.update');
    // workshops  
    Route::get('/workshops', [AdminController::class, 'workshops'])->name('workshops');
    Route::delete('/workshops-deleteRoute/{workshop}', [Workshopcontroller::class, 'destroy'])->name('workshops.destroy');
    Route::post('workshops.add', [Workshopcontroller::class, 'store'])->name('workshops.add');
    Route::put('/workshops/update/{workshop}', [Workshopcontroller::class, 'update'])->name('workshops.update');
    // Partners 
    Route::get('/partner', [AdminController::class, 'partners'])->name('partners');
    Route::delete('/partners-deleteRoute/{partner}', [Partnercontroller::class, 'destroy'])->name('partners.destroy');
    Route::post('partners.add', [Partnercontroller::class, 'store'])->name('partners.add');
    Route::put('/partners/update/{partner}', [Partnercontroller::class, 'update'])->name('partners.update');
    // Internships 
    Route::get('/internships', [AdminController::class, 'internships'])->name('internships');
    Route::delete('/internships-deleteRoute/{internship}', [InternshipController::class, 'destroy'])->name('internships.destroy');
    Route::post('internships.add', [InternshipController::class, 'store'])->name('internships.add');
    Route::put('/internships/update/{internship}', [InternshipController::class, 'update'])->name('internships.update');

    // Projects 
    Route::get('/projects', [AdminController::class, 'projects'])->name('projects');
    Route::delete('/projects-deleteRoute/{project}', [Projectcontroller::class, 'destroy'])->name('projects.destroy');
    Route::post('projects.add', [Projectcontroller::class, 'store'])->name('projects.add');
    Route::put('/projects/update/{project}', [Projectcontroller::class, 'update'])->name('projects.update');
    // fablabs 
    Route::get('/fablabs', [AdminController::class, 'fablabs'])->name('fablabs');
    Route::delete('/fablabs-deleteRoute/{fablab}', [FablabController::class, 'destroy'])->name('fablabs.destroy');
    Route::post('fablabs.add', [FablabController::class, 'store'])->name('fablabs.add');
    Route::put('/fablabs/update/{fablab}', [FablabController::class, 'update'])->name('fablabs.update');
    // programs 
    Route::get('/programs', [AdminController::class, 'programs'])->name('programs');
    Route::delete('/programs-deleteRoute/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
    Route::post('programs.add', [ProgramController::class, 'store'])->name('programs.add');
    Route::put('/programs/update/{program}', [ProgramController::class, 'update'])->name('programs.update');
});




