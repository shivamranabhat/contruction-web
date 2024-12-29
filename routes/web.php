<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController; 
use App\Http\Controllers\AdminAuthController; 
use App\Http\Controllers\AdminPasswordController; 
use App\Http\Controllers\AdminDashboardController; 
use App\Http\Controllers\UserController;
use App\Http\Controllers\FooterContentController; 
use App\Http\Controllers\ContactContentController; 
use App\Http\Controllers\AboutContentController; 
use App\Http\Controllers\BodyContentController;  
use App\Http\Controllers\ServiceController;  
use App\Http\Controllers\ServiceCategoryController;  
use App\Http\Controllers\ProjectController;  
use App\Http\Controllers\ProjectCategoryController;  
use App\Http\Controllers\BlogController;  
use App\Http\Controllers\CategoryController;  
use App\Http\Controllers\BlogCategoryController;  
use App\Http\Controllers\TestimonialController;  
use App\Http\Controllers\TagController;  
use App\Http\Controllers\OpenGraphController;  
use App\Http\Controllers\TwitterCardController;  
use App\Http\Controllers\ScriptController;  
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ContactDetailController;
use App\Http\Controllers\ExtrapageController;
use App\Http\Controllers\FaqController;  
use App\Http\Controllers\TeamController;  
use App\Http\Controllers\GalleryController;  
use App\Http\Controllers\SliderController;  

Route::fallback(function () {
    abort(404);
});
// Route::prefix('/dashboard')->controller(AdminAuthController::class)->group(function () {
//     Route::get('/login', 'login')->name('admin.login');
//     Route::get('/signup', 'signup')->name('admin.signup');
//     Route::post('/register', 'register')->name('admin.register');
//     Route::post('/auth', 'authenticate')->name('admin.authenticate');
//     Route::post('/logout', 'logout')->name('admin.logout');
// });

// Route::prefix('/dashboard')->controller(AdminPasswordResetController::class)->group(function () {
//     Route::get('/forgot-password', 'index')->name('admin.forgot.password');
//     Route::get('/send-reset-otp/email={email}', 'getResetOtp')->name('admin.get.verifyOtp');
//     Route::post('/send-reset-otp', 'sendResetOtp')->name('admin.send.verifyOtp');
//     Route::post('/verify-reset-otp/{email}', 'verifyToken')->name('admin.forgot.verifyOtp');
//     Route::get('/reset-password/email={email}&otp={otp}', 'resetPassword')->name('admin.reset.password');
//     Route::post('/update-password/{email}', 'updatePassword')->name('admin.password.update');
// });

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


Route::prefix('/dashboard')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::prefix('/dashboard')->controller(AdminAuthController::class)->group(function () {
        Route::get('/profile', 'edit')->name('admin.profile');
        Route::put('/update-profile', 'update')->name('adminProfile.update');
    });

    //Routes for account
    Route::prefix('/account')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('accounts');
        Route::get('/create', 'create')->name('account.create');
        Route::post('/store', 'store')->name('account.store');
        Route::get('/{id}', 'edit')->name('account.edit');
        Route::put('/update/{id}', 'update')->name('account.update');
        Route::delete('/delete/{id}', 'destroy')->name('account.destroy');
    });


    Route::prefix('/content')->group(function () {
        //Routes for footer contents
        Route::prefix('/footer')->controller(FooterContentController::class)->group(function () {
            Route::get('/', 'index')->name('footers');
            Route::get('/create', 'create')->name('footer.create');
            Route::post('/store', 'store')->name('footer.store');
            Route::get('/{slug}', 'edit')->name('footer.edit');
            Route::put('/update/{slug}', 'update')->name('footer.update');
            Route::delete('/delete/{slug}', 'destroy')->name('footer.destroy');
        });
        //Routes for contact contents
        Route::prefix('/contact')->controller(ContactContentController::class)->group(function () {
            Route::get('/', 'index')->name('contactContents');
            Route::get('/create', 'create')->name('contactContent.create');
            Route::post('/store', 'store')->name('contactContent.store');
            Route::get('/{slug}', 'edit')->name('contactContent.edit');
            Route::put('/update/{slug}', 'update')->name('contactContent.update');
            Route::delete('/delete/{slug}', 'destroy')->name('contactContent.destroy');
        });
        //Routes for about body contents
        Route::prefix('/about')->controller(AboutContentController::class)->group(function () {
            Route::get('/', 'index')->name('abouts');
            Route::get('/create', 'create')->name('about.create');
            Route::post('/store', 'store')->name('about.store');
            Route::get('/{slug}', 'edit')->name('about.edit');
            Route::put('/update/{slug}', 'update')->name('about.update');
            Route::delete('/delete/{slug}', 'destroy')->name('about.destroy');
        });

        //Routes for main body contents
        Route::prefix('/')->controller(BodyContentController::class)->group(function () {
            Route::get('/', 'index')->name('mains');
            Route::get('/create', 'create')->name('main.create');
            Route::post('/store', 'store')->name('main.store');
            Route::get('/{slug}', 'edit')->name('main.edit');
            Route::put('/update/{slug}', 'update')->name('main.update');
            Route::delete('/delete/{slug}', 'destroy')->name('main.destroy');
        });
    });
    Route::prefix('/')->controller(CategoryController::class)->group(function () {
        Route::get('categories/', 'index')->name('categories');
        Route::get('category/create', 'create')->name('category.create');
        Route::post('category/store', 'store')->name('category.store');
        Route::get('category/{slug}', 'edit')->name('category.edit');
        Route::put('category/update/{slug}', 'update')->name('category.update');
        Route::delete('category/delete/{slug}', 'destroy')->name('category.destroy');
    });
  
    Route::prefix('/blog')->controller(BlogCategoryController::class)->group(function () {
        Route::get('categories/', 'index')->name('blogCategories');
        Route::get('category/create', 'create')->name('blogCategory.create');
        Route::post('category/store', 'store')->name('blogCategory.store');
        Route::get('category/{slug}', 'edit')->name('blogCategory.edit');
        Route::put('category/update/{slug}', 'update')->name('blogCategory.update');
        Route::delete('category/delete/{slug}', 'destroy')->name('blogCategory.destroy');
    });
    //Routes for blog
    Route::prefix('/')->controller(BlogController::class)->group(function () {
        Route::get('blogs/', 'index')->name('blogs');
        Route::get('blog/create', 'create')->name('blog.create');
        Route::post('blog/upload-blog-img', 'uploadCkImage')->name('ckeditor.upload');
        Route::post('blog/store', 'store')->name('blog.store');
        Route::get('blog/{slug}', 'edit')->name('blog.edit');
        Route::put('blog/update/{slug}', 'update')->name('blog.update');
        Route::delete('blog/delete/{slug}', 'destroy')->name('blog.destroy');
    });
    Route::prefix('/project')->controller(ProjectCategoryController::class)->group(function () {
        Route::get('categories/', 'index')->name('projectCategories');
        Route::get('category/create', 'create')->name('projectCategory.create');
        Route::post('category/store', 'store')->name('projectCategory.store');
        Route::get('category/{slug}', 'edit')->name('projectCategory.edit');
        Route::put('category/update/{slug}', 'update')->name('projectCategory.update');
        Route::delete('category/delete/{slug}', 'destroy')->name('projectCategory.destroy');
    });
    //Routes for project
    Route::prefix('/')->controller(ProjectController::class)->group(function () {
        Route::get('projects/', 'index')->name('projects');
        Route::get('project/create', 'create')->name('project.create');
        Route::post('project/upload-project-img', 'uploadCkImage')->name('projectCkeditor.upload');
        Route::post('project/store', 'store')->name('project.store');
        Route::get('project/{slug}', 'edit')->name('project.edit');
        Route::put('project/update/{slug}', 'update')->name('project.update');
        Route::delete('project/delete/{slug}', 'destroy')->name('project.destroy');
    });
    Route::prefix('/')->controller(SliderController::class)->group(function () {
        Route::get('sliders/', 'index')->name('sliders');
        Route::get('slider/create', 'create')->name('slider.create');
        Route::post('slider/store', 'store')->name('slider.store');
        Route::get('slider/{slug}', 'edit')->name('slider.edit');
        Route::put('slider/update/{slug}', 'update')->name('slider.update');
        Route::delete('slider/delete/{slug}', 'destroy')->name('slider.destroy');
    });
    Route::prefix('/service')->controller(ServiceCategoryController::class)->group(function () {
        Route::get('categories/', 'index')->name('serviceCategories');
        Route::get('category/create', 'create')->name('serviceCategory.create');
        Route::post('category/store', 'store')->name('serviceCategory.store');
        Route::get('category/{slug}', 'edit')->name('serviceCategory.edit');
        Route::put('category/update/{slug}', 'update')->name('serviceCategory.update');
        Route::delete('category/delete/{slug}', 'destroy')->name('serviceCategory.destroy');
    });
    //Routes for blog
    Route::prefix('/')->controller(ServiceController::class)->group(function () {
        Route::get('services/', 'index')->name('services');
        Route::get('service/create', 'create')->name('service.create');
        Route::post('service/upload-service-img', 'uploadCkImage')->name('serviceCkeditor.upload');
        Route::post('service/store', 'store')->name('service.store');
        Route::get('service/{slug}', 'edit')->name('service.edit');
        Route::put('service/update/{slug}', 'update')->name('service.update');
        Route::delete('service/delete/{slug}', 'destroy')->name('service.destroy');
    });
  
    

   
    Route::prefix('/')->controller(TestimonialController::class)->group(function () {
        Route::get('testimonials/', 'index')->name('testimonials');
        Route::get('testimonial/create', 'create')->name('testimonial.create');
        Route::post('testimonial/store', 'store')->name('testimonial.store');
        Route::get('testimonial/{slug}', 'edit')->name('testimonial.edit');
        Route::put('testimonial/update/{slug}', 'update')->name('testimonial.update');
        Route::delete('testimonial/delete/{slug}', 'destroy')->name('testimonial.destroy');
    });


    Route::prefix('/seo')->group(function () {
        //Routes for tags
        Route::prefix('/tags')->controller(TagController::class)->group(function () {
            Route::get('/', 'index')->name('tags');
            Route::get('/create', 'create')->name('tag.create');
            Route::post('/store', 'store')->name('tag.store');
            Route::get('/{slug}', 'edit')->name('tag.edit');
            Route::put('/update/{slug}', 'update')->name('tag.update');
            Route::delete('/delete/{slug}', 'destroy')->name('tag.destroy');
        });

        //Routes for open graphs
        Route::prefix('/open-graph')->controller(OpenGraphController::class)->group(function () {
            Route::get('/', 'index')->name('graphs');
            Route::get('/create', 'create')->name('graph.create');
            Route::post('/store', 'store')->name('graph.store');
            Route::get('/{slug}', 'edit')->name('graph.edit');
            Route::put('/update/{slug}', 'update')->name('graph.update');
            Route::delete('/delete/{slug}', 'destroy')->name('graph.destroy');
        });
        //Routes for twitter cards
        Route::prefix('/twitter-card')->controller(TwitterCardController::class)->group(function () {
            Route::get('/', 'index')->name('cards');
            Route::get('/create', 'create')->name('card.create');
            Route::post('/store', 'store')->name('card.store');
            Route::get('/{slug}', 'edit')->name('card.edit');
            Route::put('/update/{slug}', 'update')->name('card.update');
            Route::delete('/delete/{slug}', 'destroy')->name('card.destroy');
        });
        //Routes for script
        Route::prefix('/scripts')->controller(ScriptController::class)->group(function () {
            Route::get('/', 'index')->name('scripts');
            Route::get('/create', 'create')->name('script.create');
            Route::post('/store', 'store')->name('script.store');
            Route::get('/{slug}', 'edit')->name('script.edit');
            Route::put('/update/{slug}', 'update')->name('script.update');
            Route::delete('/delete/{slug}', 'destroy')->name('script.destroy');
        });
    });
    //Route for subscribers
    Route::prefix('/subscribers')->controller(SubscriberController::class)->group(function () {
        Route::get('/', 'index')->name('subscribers');
        Route::delete('/delete/{slug}', 'destroy')->name('subscriber.destroy');
    });
    //Route for message sent by user
    Route::prefix('/messages')->controller(MessageController::class)->group(function () {
        Route::get('/', 'index')->name('messages');
        Route::get('/{slug}', 'show')->name('message.show');
        Route::delete('/delete/{slug}', 'destroy')->name('message.destroy');
    });

    //Routes for faqs
    Route::prefix('/faqs')->controller(FaqController::class)->group(function () {
        Route::get('/', 'index')->name('faqs');
        Route::get('/create', 'create')->name('faq.create');
        Route::post('/store', 'store')->name('faq.store');
        Route::get('/{slug}', 'edit')->name('faq.edit');
        Route::put('/update/{slug}', 'update')->name('faq.update');
        Route::delete('/destroy/{slug}', 'destroy')->name('faq.destroy');
    });
    //Routes for contact details
    Route::prefix('/contact-details')->controller(ContactDetailController::class)->group(function () {
        Route::get('/', 'index')->name('contactDetails');
        Route::get('/create', 'create')->name('contactDetail.create');
        Route::post('/store', 'store')->name('contactDetail.store');
        Route::get('/{id}', 'edit')->name('contactDetail.edit');
        Route::put('/update/{id}', 'update')->name('contactDetail.update');
        Route::delete('/delete/{id}', 'destroy')->name('contactDetail.destroy');
    });
    //Routes for extra pages
    Route::prefix('/page')->controller(ExtrapageController::class)->group(function () {
        Route::get('/', 'index')->name('pages');
        Route::get('/create', 'create')->name('page.create');
        Route::post('/upload-description', 'uploadDescription')->name('pageDescription.upload');
        Route::post('/store', 'store')->name('page.store');
        Route::get('/{slug}', 'edit')->name('page.edit');
        Route::put('/update/{slug}', 'update')->name('page.update');
        Route::delete('/delete/{slug}', 'destroy')->name('page.destroy');
    });

    Route::prefix('/about')->group(function () {
        //Routes for team
        Route::prefix('/team')->controller(TeamController::class)->group(function () {
            Route::get('/', 'index')->name('teams');
            Route::get('/create', 'create')->name('team.create');
            Route::post('/team-upload', 'uploadTeam')->name('team.upload');
            Route::post('/store', 'store')->name('team.store');
            Route::get('/{slug}', 'edit')->name('team.edit');
            Route::put('/update/{slug}', 'update')->name('team.update');
            Route::delete('/delete/{slug}', 'destroy')->name('team.destroy');
        });
       
        Route::prefix('/galleries')->controller(GalleryController::class)->group(function () {
            Route::get('/', 'index')->name('galleries');
            Route::get('/create', 'create')->name('gallery.create');
            Route::post('/store', 'store')->name('gallery.store');
            Route::get('/{slug}', 'show')->name('gallery.show');
            Route::get('/edit/{slug}', 'edit')->name('gallery.edit');
            Route::put('/update/{slug}', 'update')->name('gallery.update');
            Route::delete('/delete/{slug}', 'destroy')->name('gallery.destroy');
        });
    });
  
});

Route::controller(PageController::class)->group(function()
{
    Route::get('/','index')->name('index');
    Route::get('/mission','mission')->name('home.mission');
    Route::get('/team','team')->name('home.team');
    Route::get('/contact','contact')->name('home.contact');
    Route::get('/news','blogs')->name('home.blogs');
    Route::get('/news-details','blog')->name('home.blog');
    Route::get('/our-business','business')->name('home.business');
    Route::get('/projects','projects')->name('home.projects');
});