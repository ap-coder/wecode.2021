<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Page;
use App\Models\Post;
use App\Models\Project;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Harimayco\Menu\Facades\Menu;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request)
	{
        $this->middleware(function ($request, $next) {
            $env = App::environment();
            View::share('env', $env);

            $pagename=\Route::current()->getName();
            
            $top_sections='';
			$bottom_sections='';

            $landingPageData=Page::where('slug',request()->route('pageslug'))->first();

            if ($pagename=='page.show') {
				$pageData=Page::where('slug',request()->route('pageslug'))->first();
				if ($pageData) {
					$top_sections=$pageData->pagesContentSections;
					$bottom_sections=$pageData->pagesContentSections;
				}
				
			} elseif($pagename=='blog.show') {
				$pageData=Post::where('slug',request()->route('blog'))->first();
				if ($pageData) {
					$top_sections=$pageData->postsContentSections;
					$bottom_sections=$pageData->postsContentSections;
				}
			}

            $landingPages = Page::all();
            $posts = Post::all();
            $projects = Project::all();

            View::share('landingPages', $landingPages);
            View::share('posts', $posts);
            View::share('projects', $projects);
            View::share('landingPageData', $landingPageData);

            View::share('top_sections', $top_sections);
            View::share('bottom_sections', $bottom_sections);


            $main_menu = Menu::getByName('Main Menu');
            $footer_widget_menu = Menu::getByName('Footer Widget Menu');
            $copyright_menu = Menu::getByName('Copyright Menu');

            View::share('main_menu', $main_menu);
            View::share('footer_widget_menu', $footer_widget_menu);
            View::share('copyright_menu', $copyright_menu);

            return $next($request);
        });
    }
}
