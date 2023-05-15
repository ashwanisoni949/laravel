<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\JavascriptController;
use App\Http\Controllers\User\AjaxController;
use App\Http\Controllers\User\BootstrapController;
use App\Http\Controllers\User\JqueryController;
use App\Http\Controllers\User\PHPController;
use App\Http\Controllers\User\PYTHONController;
use App\Http\Controllers\User\CommentController;


//homecontroller 
use App\Http\Controllers\HomeController;



//Admin Controller
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\FileUploadController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ImageBlogController;




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


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

// Route::group(['middleware' => 'auth'], function () {
    // Route::get('/', function () {
    //     return view('users.index');
    // })->name('home');
    Route::get('/',[HomeController::class,'index'])->name('home');

// });
    Route::post('generate-qr',[QRCodeController::class,'store'])->name('generate-qr');

    Route::get('/route-cache', function() {

        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
       return 'Routes cache cleared';
   });
   Route::get('/search-blog',[HomeController::class,'SearchBlog'])->name('search-blog');

// User Route
Route::group(['as'=> 'user.', 'prefix' => 'user'],function (){

    Route::resource('/contact',ContactController::class);
    Route::resource('/comment', CommentController::class);
    Route::post('/comment-delete',[CommentController::class,'CommentDelete'])->name('comment-delete');

    
    Route::get('/search',[BlogController::class,'BlogSearch'])->name('search');
    Route::get('/css-search',[HomeController::class,'CSSSearch'])->name('css-search');
    Route::get('/js-search',[HomeController::class,'JSSearch'])->name('js-search');
    Route::get('/jquery-search',[HomeController::class,'JquerySearch'])->name('jquery-search');
    Route::get('/ajax-search',[HomeController::class,'AJAXSearch'])->name('ajax-search');
    Route::get('/php-search',[HomeController::class,'PHPSearch'])->name('php-search');
    Route::get('/ci-search',[HomeController::class,'CISearch'])->name('ci-search');
    Route::get('/laravel-search',[HomeController::class,'LARAVELSearch'])->name('laravel-search');
    Route::get('/result-search',[HomeController::class,'RESULTSearch'])->name('result-search');
    Route::get('/latest-jobs-search',[HomeController::class,'LatestJobsSearch'])->name('latest-jobs-search');
    Route::get('/upboard-search',[HomeController::class,'UPBoardSearch'])->name('upboard-search');
    Route::get('/syllabus-search',[HomeController::class,'SymbolsSearch'])->name('syllabus-search');
    Route::get('/computer-search',[HomeController::class,'ComputerSearch'])->name('computer-search');
    Route::get('/course-search',[HomeController::class,'CourseSearch'])->name('course-search');
    Route::get('/gold-silver-search',[HomeController::class,'GoldSilverSearch'])->name('gold-silver-search');

    Route::post('/user-update',[HomeController::class,'UserReplyUpdate'])->name('user-update');
    Route::get('/latest-jobs', [HomeController::class,'LatestJobs'])->name('latest-jobs');
    Route::get('/result', [HomeController::class,'Result'])->name('result');
    Route::get('/syllabus', [HomeController::class,'Syllabus'])->name('syllabus');
    Route::get('/10th-12th-up-board', [HomeController::class,'UpBoard'])->name('10th-12th-up-board');
    Route::get('/laravel', [HomeController::class,'LaravelMenu'])->name('laravel');
    Route::get('/ci', [HomeController::class,'CIMenu'])->name('ci');
    Route::get('/html', [HomeController::class,'HTMLMenu'])->name('html');
    Route::get('/css', [HomeController::class,'CSSMenu'])->name('css');
    Route::get('/javascript', [HomeController::class,'JavascriptMenu'])->name('javascript');
    Route::get('/ajax', [HomeController::class,'AjaxMenu'])->name('ajax');
    Route::get('/bootstrap', [HomeController::class,'BootstrapMenu'])->name('bootstrap');
    Route::get('/jquery', [HomeController::class,'JqueryMenu'])->name('jquery');
    Route::get('/about-us', [HomeController::class,'AboutUs'])->name('about-us');
    Route::get('/terms-and-conditions', [HomeController::class,'termsCondition'])->name('terms-and-conditions');
    Route::get('/privacy-policy', [HomeController::class,'privacyPolicy'])->name('privacy-policy');
    Route::get('/disclaimer', [HomeController::class,'Disclaimer'])->name('disclaimer');
    Route::get('/computer', [HomeController::class,'Computer'])->name('computer');
    Route::get('/shayari', [HomeController::class,'Shayari'])->name('shayari');
    Route::get('/gold-silver', [HomeController::class,'GoldSilver'])->name('gold-silver');
    Route::get('/course', [HomeController::class,'Course'])->name('course');

    Route::get('/php', [HomeController::class,'PhpMenu'])->name('php');
    Route::get('/python', [HomeController::class,'PythonMenu'])->name('python');
    Route::get('/all-category', [HomeController::class,'AllCategory'])->name('all-category');
    Route::get('/user-reply',[HomeController::class,'UserReply'])->name('user-reply');
    Route::get('/admin-reply',[HomeController::class,'AdminReply'])->name('admin-reply');
    Route::post('/admin-update',[HomeController::class,'AdminReplyUpdate'])->name('admin-update');
});

//Admin Route
Route::group(['as'=> 'admin.', 'prefix' => 'admin'],function (){
    Route::resource('/post',PostController::class);
    Route::resource('/file-upload',FileUploadController::class);
    Route::resource('/category',AdminCategoryController::class);
    Route::resource('/tag',TagController::class);
    Route::post('/CategoryDestroy/{id}',[AdminCategoryController::class,'CategoryDestroy'])->name('CategoryDestroy');
    Route::post('/changecategoryStatus',[AdminCategoryController::class,'changeDesignationStatus'])->name('changecategoryStatus');
    Route::post('/changeTagStatus',[TagController::class,'changeTagStatus'])->name('changeTagStatus');
    Route::resource('/blog', BlogController::class);
    Route::resource('/blog-image', ImageBlogController::class);
    Route::post('/blogStatus',[BlogController::class,'BlogStatus'])->name('blogStatus');

});
Route::get('/{category}/{slug}',[BlogController::class,'blogDetails'])->name('blog.details');

   
   

require __DIR__.'/auth.php';
