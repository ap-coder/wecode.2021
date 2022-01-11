<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\PostObserver;
use App\Observers\ProjectObserver;
use App\Observers\CategoryObserver;
use App\Observers\PageSectionObserver;

use App\Models\Post;
use App\Models\Project;
use App\Models\Category;
use App\Models\Pagesection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        Project::observe(ProjectObserver::class);
        Category::observe(CategoryObserver::class);
        Pagesection::observe(PageSectionObserver::class);
    }
}
