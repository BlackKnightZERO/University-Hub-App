<?php
use App\App\Http\Controllers\UniversityController;
use App\App\Http\Controllers\UniversityProgramController;
use App\App\Http\Controllers\FrontEndController;
use Illuminate\Support\Facades\Artisan;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
 
    return "Cache cleared successfully";
 });

Route::get('/', 'FrontEndController@landingPage')->name('frontend.landingPage');
Route::get('/division-wise-university/{id}', 'FrontEndController@divisionWiseUniversityPage')->name('frontend.divisionWiseUniversityPage');
Route::get('/university-details/{id}', 'FrontEndController@universityDetailsPage')->name('frontend.universityDetailsPage');
Route::get('/university-program-details/{id}', 'FrontEndController@universityProgramDetailsPage')->name('frontend.universityProgramDetailsPage');
Route::get('/university-list', 'FrontEndController@universityListPage')->name('frontend.universityListPage');
Route::get('/program-list', 'FrontEndController@programListPage')->name('frontend.programListPage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
    Route::delete('/university-soft-delete/{id}', 'UniversityController@softDelete')->name('university.softDelete');
    Route::resource('universities', 'UniversityController');
    Route::delete('/program-soft-delete/{id}', 'UniversityProgramController@softDelete')->name('program.softDelete');
    Route::resource('universityPrograms', 'UniversityProgramController');
});
