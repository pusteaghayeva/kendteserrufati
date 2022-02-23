<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\AqrarCategoryController;
use App\Http\Controllers\Backend\CollegesController as BackendCollegesController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\GalleryImagesController;
use App\Http\Controllers\Backend\LawController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\AqrarNewsController;
use App\Http\Controllers\Backend\NewsImagesController;
//use App\Http\Controllers\Backend\NewsİmagesController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\PhotoGalleriesController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StaticPagesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\CKEditorController;
//use App\Http\Controllers\Frontend\AdviceController;
use App\Http\Controllers\Frontend\CollegesController;
use App\Http\Controllers\Frontend\FrontNewsController;
use App\Http\Controllers\Frontend\AqrarNewsController as FrontendAqrarNewsController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LawsController;
use App\Http\Controllers\Frontend\LetterController;
use App\Http\Controllers\Frontend\PhotoController as FrontendPhotoController;
use App\Http\Controllers\Frontend\RegulationController;
use App\Http\Controllers\Frontend\ReportController;
use App\Http\Controllers\Frontend\SettingController as FrontendSettingController;
use App\Http\Controllers\Frontend\SingleNewsController;
use App\Http\Controllers\Frontend\AqrarsingleNewsController;
use App\Http\Controllers\Frontend\StructureController;
use App\Http\Controllers\Frontend\VideoGalleryController;
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

Route::name('frontend.')->group(function()
{
    Route::get('/', [HomeController::class, 'index'])->name('home');
//    Route::get('/advice', [AdviceController::class, 'advice'])->name('advice');
    Route::get('/regulation', [RegulationController::class, 'regulation'])->name('regulation');
    Route::get('/report', [ReportController::class, 'report'])->name('report');
    Route::get('/single_report', [ReportController::class, 'single_report'])->name('single_report');
    Route::get('/colleges', [CollegesController::class, 'colleges'])->name('colleges');
    Route::get('/structure', [StructureController::class, 'structure'])->name('structure');
    Route::get('/laws', [LawsController::class, 'laws'])->name('laws');
    Route::get('/sliders', [SliderController::class, 'sliders'])->name('sliders');
    Route::get('/news', [FrontNewsController::class, 'news'])->name('news');
    Route::get('/news/{id}', [FrontNewsController::class, 'news'])->name('single_news');
    Route::get('/single_news', [SingleNewsController::class, 'single_news'])->name('single_news');
    Route::get('/aqrarsingle_news', [AqrarsingleNewsController::class, 'aqrarsingle_news'])->name('aqrarsingle_news');
    Route::get('/aqrarnews', [FrontendAqrarNewsController::class, 'aqrarnews'])->name('aqrarnews');
    Route::get('/photos', [FrontendPhotoController::class, 'photos'])->name('photos');
    Route::get('/gallery', [GalleryController::class, 'gallery'])->name('gallery');
    Route::get('/video_gallery', [VideoGalleryController::class, 'video_gallery'])->name('video_gallery');
    Route::get('/letter', [LetterController::class, 'letter'])->name('letter');
    Route::get('/mail', [LetterController::class, 'mail'])->name('mail');
    Route::get('/settings', [FrontendSettingController::class, 'setting'])->name('setting');
    Route::get('/colleges', [CollegesController::class, 'colleges'])->name('colleges');
    Route::get('/single_college', [CollegesController::class, 'single_college'])->name('single_college');
    Route::post('/contact-send', [LetterController::class, 'send']);

});


Route::prefix('admnpnladminstrator/ktn')->name('backend.')->group(function()
{
    Route::middleware('guest:admin')->group(function() {
        Route::get('/login', [AuthController::class, 'login_form'])->name('login.form');
        Route::post('/login', [AuthController::class, 'login'])->name('login');
    });

        Route::middleware('auth:admin')->group(function()
        {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('/admins', AdminController::class);
        Route::resource('/pages', PageController::class);
        Route::resource('/news', NewsController::class);
        Route::resource('/sliders', SliderController::class);
        Route::resource('/users', UserController::class);
        Route::resource('/laws', LawController::class);
        Route::resource('/videos', VideoController::class);
        Route::resource('/static_pages', StaticPagesController::class);
        Route::resource('/photos', PhotoController::class);
        Route::resource('/categories', CategoryController::class);
        Route::resource('/aqrarcategories', AqrarCategoryController::class);
        Route::resource('/aqrarnews',AqrarNewsController::class);
        Route::resource('/settings', SettingController::class);
        Route::resource('/photo_galleries', PhotoGalleriesController::class);
        Route::resource('/colleges', BackendCollegesController::class);
        Route::resource('/news_images', NewsImagesController::class);


        

        

      
    });

});