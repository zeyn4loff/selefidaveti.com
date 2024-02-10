<?php

use App\Http\Controllers\Admin\AudioCategoryController;
use App\Http\Controllers\Admin\AudioController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SettingController;

use App\Http\Controllers\Site\HomeController as SiteHomeController;
use App\Http\Controllers\Site\SearchController as SiteSearchController;
use App\Http\Controllers\Site\BlogCategoryController as SiteBlogCategoryController;
use App\Http\Controllers\Site\AudioCategoryController as SiteAudioCategoryController;
use App\Http\Controllers\Site\BlogController as SiteBlogController;
use App\Http\Controllers\Site\QuestionController as SiteQuestionController;

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

Route::prefix('fpanel')->name('admin.')->group(function () {
    Route::resources([
        'slider' => SliderController::class,
        'blog-category' => BlogCategoryController::class,
        'blog' => BlogController::class,
        'audio-category' => AudioCategoryController::class,
        'audio' => AudioController::class,
        'question' => QuestionController::class,
        'contact' => ContactController::class,
        'setting' => SettingController::class,
    ]);

    Route::post('slider/status', [SliderController::class, 'status'])->name('slider.status.ajax');
    Route::post('slider/destroy', [SliderController::class, 'destroy'])->name('slider.destroy.ajax');

    Route::post('blog-category/status', [BlogCategoryController::class, 'status'])->name('blog-category.status.ajax');
    Route::post('blog-category/destroy', [BlogCategoryController::class, 'destroy'])->name('blog-category.destroy.ajax');

    Route::post('blog/status', [BlogController::class, 'status'])->name('blog.status.ajax');
    Route::post('blog/destroy', [BlogController::class, 'destroy'])->name('blog.destroy.ajax');

    Route::post('audio-category/status', [AudioCategoryController::class, 'status'])->name('audio-category.status.ajax');
    Route::post('audio-category/destroy', [AudioCategoryController::class, 'destroy'])->name('audio-category.destroy.ajax');

    Route::post('audio/status', [AudioController::class, 'status'])->name('audio.status.ajax');
    Route::post('audio/destroy', [AudioController::class, 'destroy'])->name('audio.destroy.ajax');

    Route::post('question/status', [QuestionController::class, 'status'])->name('question.status.ajax');
    Route::post('question/destroy', [QuestionController::class, 'destroy'])->name('question.destroy.ajax');
});



Route::get('/', [SiteHomeController::class, 'index'])->name('site.home.get');
Route::get('search/{key}', [SiteSearchController::class, 'index'])->name('site.search.get');
Route::get('category/{parentSlug}/{childSlug?}', [SiteBlogCategoryController::class, 'index'])->name('site.blog-category.slug.get');
Route::get('blog/{slug}', [SiteBlogController::class, 'detail'])->name('site.blog.slug.get');
Route::get('audio-category/{slug}', [SiteAudioCategoryController::class, 'index'])->name('site.audio-category.slug.get');
Route::get('questions', [SiteQuestionController::class, 'index'])->name('site.question.index.get');
Route::get('questions/{slug}', [SiteQuestionController::class, 'detail'])->name('site.question.detail.get');
Route::get('question/ask', [SiteQuestionController::class, 'create'])->name('site.question.create.get');
Route::post('question/store', [SiteQuestionController::class, 'store'])->name('site.question.store.post');
