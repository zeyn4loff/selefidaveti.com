<?php

namespace App\Providers;

use App\Models\AudioCategory;
use App\Models\BlogCategory;
use App\Models\Contact;
use App\Models\Setting;
use App\Repositories\Admin\Audio\AudioRepository;
use App\Repositories\Admin\Audio\AudioRepositoryInterface;
use App\Repositories\Admin\AudioCategory\AudioCategoryRepository;
use App\Repositories\Admin\AudioCategory\AudioCategoryRepositoryInterface;
use App\Repositories\Admin\Blog\BlogRepository;
use App\Repositories\Admin\Blog\BlogRepositoryInterface;
use App\Repositories\Admin\BlogCategory\BlogCategoryRepository;
use App\Repositories\Admin\BlogCategory\BlogCategoryRepositoryInterface;
use App\Repositories\Admin\Contact\ContactRepository;
use App\Repositories\Admin\Contact\ContactRepositoryInterface;
use App\Repositories\Admin\Question\QuestionRepository;
use App\Repositories\Admin\Question\QuestionRepositoryInterface;
use App\Repositories\Admin\Setting\SettingRepository;
use App\Repositories\Admin\Setting\SettingRepositoryInterface;
use App\Repositories\Admin\Slider\SliderRepository;
use App\Repositories\Admin\Slider\SliderRepositoryInterface;
use App\View\Components\BlogList;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(SliderRepositoryInterface::class, SliderRepository::class);
        $this->app->bind(BlogCategoryRepositoryInterface::class, BlogCategoryRepository::class);
        $this->app->bind(BlogRepositoryInterface::class, BlogRepository::class);
        $this->app->bind(AudioCategoryRepositoryInterface::class, AudioCategoryRepository::class);
        $this->app->bind(AudioRepositoryInterface::class, AudioRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::component('site/blog-list', BlogList::class);
        if (config('database.default') !== 'sqlite') {
            try {

                $pdo = DB::connection()->getPdo();
                if ($pdo) {
                    $setting = Setting::where('id', config('constants.FIRST_ID'))->first();
                    $contacts = Contact::where('id', config('constants.FIRST_ID'))->first();
                    $categories = BlogCategory::getParentCategories();
                    $audioCategories = AudioCategory::where('status', config('constants.ACTIVE'))->get();
                    view()->composer('layouts.site', function ($view) use ( $setting, $contacts, $categories, $audioCategories) {
                        $view->with([
                            'setting' => $setting,
                            'contacts' => $contacts,
                            'categories' => $categories,
                            'audioCategories' => $audioCategories
                        ]);
                    });
                }
            } catch (\Exception $e) {
            }
        }
    }
}
