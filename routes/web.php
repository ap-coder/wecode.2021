<?php
use Illuminate\Http\Request;

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('admin');

    Route::get('/menu', 'MenuController@index')->name('menu.index');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Staff
    Route::delete('staff/destroy', 'StaffController@massDestroy')->name('staff.massDestroy');
    Route::post('staff/media', 'StaffController@storeMedia')->name('staff.storeMedia');
    Route::post('staff/ckmedia', 'StaffController@storeCKEditorImages')->name('staff.storeCKEditorImages');
    Route::resource('staff', 'StaffController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::resource('pages', 'PagesController');
    Route::post('pages/media', 'PagesController@storeMedia')->name('pages.storeMedia');
    Route::post('pages/ckmedia', 'PagesController@storeCKEditorImages')->name('pages.storeCKEditorImages');
    Route::post('GetPageContentSectionModalForm', 'PagesController@GetPageContentSectionModalForm');
	Route::post('AddPageContentSection', 'PagesController@AddPageContentSection');
	Route::post('ChangePageContentSectionOrder', 'PagesController@ChangePageContentSectionOrder');
	Route::post('GetPageSectionModalForm', 'PagesController@GetPageSectionModalForm');
	Route::post('AddPageSection', 'PagesController@AddPageSection');
	Route::post('ChangePageSectionOrder', 'PagesController@ChangePageSectionOrder');
	Route::post('AddExistingPageSection', 'PagesController@AddExistingPageSection');
	Route::post('clearAllExistingPageSection', 'PagesController@clearAllExistingPageSection');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoryController');

    // Topic
    Route::delete('topics/destroy', 'TopicController@massDestroy')->name('topics.massDestroy');
    Route::post('topics/media', 'TopicController@storeMedia')->name('topics.storeMedia');
    Route::post('topics/ckmedia', 'TopicController@storeCKEditorImages')->name('topics.storeCKEditorImages');
    Route::resource('topics', 'TopicController');

    // Thread
    Route::delete('threads/destroy', 'ThreadController@massDestroy')->name('threads.massDestroy');
    Route::post('threads/media', 'ThreadController@storeMedia')->name('threads.storeMedia');
    Route::post('threads/ckmedia', 'ThreadController@storeCKEditorImages')->name('threads.storeCKEditorImages');
    Route::resource('threads', 'ThreadController');

    // Reply
    Route::delete('replies/destroy', 'ReplyController@massDestroy')->name('replies.massDestroy');
    Route::post('replies/media', 'ReplyController@storeMedia')->name('replies.storeMedia');
    Route::post('replies/ckmedia', 'ReplyController@storeCKEditorImages')->name('replies.storeCKEditorImages');
    Route::resource('replies', 'ReplyController');

    // Video Content
    Route::delete('video-contents/destroy', 'VideoContentController@massDestroy')->name('video-contents.massDestroy');
    Route::post('video-contents/media', 'VideoContentController@storeMedia')->name('video-contents.storeMedia');
    Route::post('video-contents/ckmedia', 'VideoContentController@storeCKEditorImages')->name('video-contents.storeCKEditorImages');
    Route::resource('video-contents', 'VideoContentController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');
    Route::post('GetPostContentSectionModalForm', 'PostController@GetPostContentSectionModalForm');
	Route::post('AddPostContentSection', 'PostController@AddPostContentSection');
	Route::post('ChangePostContentSectionOrder', 'PostController@ChangePostContentSectionOrder');

    // Time Work Type
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Project
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entry
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Report
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Pagesection
    Route::delete('pagesections/destroy', 'PagesectionController@massDestroy')->name('pagesections.massDestroy');
    Route::resource('pagesections', 'PagesectionController');

    // Content Section
    Route::delete('content-sections/destroy', 'ContentSectionController@massDestroy')->name('content-sections.massDestroy');
    Route::resource('content-sections', 'ContentSectionController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectsController');

    // Technology
    Route::delete('technologies/destroy', 'TechnologyController@massDestroy')->name('technologies.massDestroy');
    Route::resource('technologies', 'TechnologyController');

    
	Route::post('add_env_conditionals', function(Request $request) {

		if($request->evnsData){
		
			foreach ($request->evnsData as $key => $value) {
				\DB::table('admin_menu_items')->where('id', $value['menu_id'])->update( [$value['envs'] => $value['check']]);
			}
		}

   })->name('add_env_conditionals');

});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // Staff
    Route::delete('staff/destroy', 'StaffController@massDestroy')->name('staff.massDestroy');
    Route::post('staff/media', 'StaffController@storeMedia')->name('staff.storeMedia');
    Route::post('staff/ckmedia', 'StaffController@storeCKEditorImages')->name('staff.storeCKEditorImages');
    Route::resource('staff', 'StaffController');

    // Pages
    Route::delete('pages/destroy', 'PagesController@massDestroy')->name('pages.massDestroy');
    Route::resource('pages', 'PagesController');

    // Category
    Route::delete('categories/destroy', 'CategoryController@massDestroy')->name('categories.massDestroy');
    Route::post('categories/media', 'CategoryController@storeMedia')->name('categories.storeMedia');
    Route::post('categories/ckmedia', 'CategoryController@storeCKEditorImages')->name('categories.storeCKEditorImages');
    Route::resource('categories', 'CategoryController');

    // Topic
    Route::delete('topics/destroy', 'TopicController@massDestroy')->name('topics.massDestroy');
    Route::post('topics/media', 'TopicController@storeMedia')->name('topics.storeMedia');
    Route::post('topics/ckmedia', 'TopicController@storeCKEditorImages')->name('topics.storeCKEditorImages');
    Route::resource('topics', 'TopicController');

    // Thread
    Route::delete('threads/destroy', 'ThreadController@massDestroy')->name('threads.massDestroy');
    Route::post('threads/media', 'ThreadController@storeMedia')->name('threads.storeMedia');
    Route::post('threads/ckmedia', 'ThreadController@storeCKEditorImages')->name('threads.storeCKEditorImages');
    Route::resource('threads', 'ThreadController');

    // Reply
    Route::delete('replies/destroy', 'ReplyController@massDestroy')->name('replies.massDestroy');
    Route::post('replies/media', 'ReplyController@storeMedia')->name('replies.storeMedia');
    Route::post('replies/ckmedia', 'ReplyController@storeCKEditorImages')->name('replies.storeCKEditorImages');
    Route::resource('replies', 'ReplyController');

    // Video Content
    Route::delete('video-contents/destroy', 'VideoContentController@massDestroy')->name('video-contents.massDestroy');
    Route::post('video-contents/media', 'VideoContentController@storeMedia')->name('video-contents.storeMedia');
    Route::post('video-contents/ckmedia', 'VideoContentController@storeCKEditorImages')->name('video-contents.storeCKEditorImages');
    Route::resource('video-contents', 'VideoContentController');

    // Post
    Route::delete('posts/destroy', 'PostController@massDestroy')->name('posts.massDestroy');
    Route::post('posts/media', 'PostController@storeMedia')->name('posts.storeMedia');
    Route::post('posts/ckmedia', 'PostController@storeCKEditorImages')->name('posts.storeCKEditorImages');
    Route::resource('posts', 'PostController');
    

    // Time Work Type
    Route::delete('time-work-types/destroy', 'TimeWorkTypeController@massDestroy')->name('time-work-types.massDestroy');
    Route::resource('time-work-types', 'TimeWorkTypeController');

    // Time Project
    Route::delete('time-projects/destroy', 'TimeProjectController@massDestroy')->name('time-projects.massDestroy');
    Route::resource('time-projects', 'TimeProjectController');

    // Time Entry
    Route::delete('time-entries/destroy', 'TimeEntryController@massDestroy')->name('time-entries.massDestroy');
    Route::resource('time-entries', 'TimeEntryController');

    // Time Report
    Route::delete('time-reports/destroy', 'TimeReportController@massDestroy')->name('time-reports.massDestroy');
    Route::resource('time-reports', 'TimeReportController');

    // Faq Category
    Route::delete('faq-categories/destroy', 'FaqCategoryController@massDestroy')->name('faq-categories.massDestroy');
    Route::resource('faq-categories', 'FaqCategoryController');

    // Faq Question
    Route::delete('faq-questions/destroy', 'FaqQuestionController@massDestroy')->name('faq-questions.massDestroy');
    Route::resource('faq-questions', 'FaqQuestionController');

    // Pagesection
    Route::delete('pagesections/destroy', 'PagesectionController@massDestroy')->name('pagesections.massDestroy');
    Route::resource('pagesections', 'PagesectionController');

    // Content Section
    Route::delete('content-sections/destroy', 'ContentSectionController@massDestroy')->name('content-sections.massDestroy');
    Route::resource('content-sections', 'ContentSectionController');

    // Projects
    Route::delete('projects/destroy', 'ProjectsController@massDestroy')->name('projects.massDestroy');
    Route::post('projects/media', 'ProjectsController@storeMedia')->name('projects.storeMedia');
    Route::post('projects/ckmedia', 'ProjectsController@storeCKEditorImages')->name('projects.storeCKEditorImages');
    Route::resource('projects', 'ProjectsController');

    // Technology
    Route::delete('technologies/destroy', 'TechnologyController@massDestroy')->name('technologies.massDestroy');
    Route::resource('technologies', 'TechnologyController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
});
