<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Backend\AdminsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SocialController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\SocialtController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\ClientlogoController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\ChooseController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\PController;
use App\Http\Controllers\Backend\PcatController;
use App\Http\Controllers\Backend\SController;
use App\Http\Controllers\Backend\ScatController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AddressController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\ForgetPasswordController;
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

Route::get('/clear', function() {
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});

Auth::routes();
Route::get('/', [MainController::class,'redirectAdmin'])->name('index');
Route::get('/service/{slug}', [MainController::class,'service'])->name('service');
Route::get('/Pos&Inventory', [MainController::class,'Pos_Inventory'])->name('Pos&Inventory');
Route::get('/school_&_college_management', [MainController::class,'school_management'])->name('school&management');
Route::get('/bulk-sms', [MainController::class,'bulk_sms'])->name('bulk-sms');
Route::get('/hosting', [MainController::class,'hosting'])->name('hosting');



Route::get('/all/portfolio', [MainController::class,'portfolio'])->name('portfolio');
Route::get('/portfolio/{slug}', [MainController::class,'portfoliodetail'])->name('portfoliodetail');
Route::get('single/portfolio/{slug}', [MainController::class,'portfoliosingle'])->name('portfoliosingle');


Route::get('/news', [MainController::class,'news'])->name('news');
Route::get('/news/{view}', [MainController::class,'viewnews'])->name('viewn');
Route::get('/team', [MainController::class,'team'])->name('team');
Route::get('/about', [MainController::class,'about'])->name('about');
Route::get('/contact', [MainController::class,'contact'])->name('contact');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// mizan
Route::post('demologin', [MainController::class, 'request_login'])->name('requestdemologin');
// host description
Route::get('cloud-description', [MainController::class, 'cloud_description'])->name('cloud_description');

// Payment Gateway
Route::get('order-info', [PaymentController::class, 'create_order_info'])->name('create_order_info');

Route::post('order-info-store', [PaymentController::class, 'store_order_info'])->name('store_order_info');


Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
     //Route::resource('roles',RolesController::class);
    Route::get('roles', [RolesController::class, 'index'])->name('admin.roles');
    Route::get('roles/create', [RolesController::class, 'create'])->name('admin.roles.create');
    Route::post('roles/store', [RolesController::class, 'store'])->name('admin.roles.store');
    Route::get('roles/edit/{id}', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::put('roles/update/{id}', [RolesController::class, 'update'])->name('admin.roles.update');

    Route::delete('roles/delete/{id}', [RolesController::class, 'delete'])->name('admin.roles.delete');


    Route::get('users', [UsersController::class, 'index'])->name('admin.users');
    Route::get('users/create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::post('users/store', [UsersController::class, 'store'])->name('admin.users.store');
    Route::get('users/edit/{id}', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::put('users/update/{id}', [UsersController::class, 'update'])->name('admin.users.update');

    Route::delete('users/delete/{id}', [UsersController::class, 'delete'])->name('admin.users.delete');


    Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission');
    Route::get('permission/create', [PermissionController::class, 'create'])->name('admin.permission.create');
    Route::post('permission/store', [PermissionController::class, 'store'])->name('admin.permission.store');
    Route::get('permission/edit/{id}', [PermissionController::class, 'edit'])->name('admin.permission.edit');
    Route::get('permission/view/{gname}', [PermissionController::class, 'view'])->name('admin.permission.view');
    Route::post('permission/update', [PermissionController::class, 'update'])->name('admin.permission.update');

    Route::delete('permission/delete/{id}', [PermissionController::class, 'delete'])->name('admin.permission.delete');




    Route::get('admins', [AdminsController::class, 'index'])->name('admin.admins');
    Route::get('admins/create', [AdminsController::class, 'create'])->name('admin.admins.create');
    Route::post('admins/store', [AdminsController::class, 'store'])->name('admin.admins.store');
    Route::get('admins/edit/{id}', [AdminsController::class, 'edit'])->name('admin.admins.edit');
    Route::put('admins/update/{id}', [AdminsController::class, 'update'])->name('admin.admins.update');

    Route::delete('admins/delete/{id}', [AdminsController::class, 'delete'])->name('admin.admins.delete');


    Route::get('address', [AddressController::class, 'index'])->name('admin.address');
    Route::get('address/create', [AddressController::class, 'create'])->name('admin.address.create');
    Route::post('address/store', [AddressController::class, 'store'])->name('admin.address.store');
    Route::get('address/edit/{id}', [AddressController::class, 'edit'])->name('admin.address.edit');
    Route::post('address/update/', [AddressController::class, 'update'])->name('admin.address.update');

    Route::delete('address/delete/{id}', [AddressController::class, 'delete'])->name('admin.address.delete');


    Route::get('logo', [LogoController::class, 'index'])->name('admin.logo');
    Route::get('logo/create', [LogoController::class, 'create'])->name('admin.logo.create');
    Route::post('logo/store', [LogoController::class, 'store'])->name('admin.logo.store');


    Route::post('logo/edit/', [LogoController::class, 'edit'])->name('admin.logo.edit');




   
    Route::post('logo/update/', [LogoController::class, 'update'])->name('admin.logo.update');

    Route::post('logo/view/', [LogoController::class, 'view'])->name('admin.logo.view');

    Route::delete('logo/delete/{id}', [LogoController::class, 'delete'])->name('admin.logo.delete');


    Route::get('banner', [BannerController::class, 'index'])->name('admin.banner');
    Route::get('banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
    Route::post('banner/update', [BannerController::class, 'update'])->name('admin.banner.update');

    Route::delete('banner/delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');


    Route::get('choose', [ChooseController::class, 'index'])->name('admin.choose');
    Route::get('choose/create', [ChooseController::class, 'create'])->name('admin.choose.create');
    Route::post('choose/store', [ChooseController::class, 'store'])->name('admin.choose.store');
    Route::get('choose/edit/{id}', [ChooseController::class, 'edit'])->name('admin.choose.edit');
    Route::get('choose/view/{id}', [ChooseController::class, 'view'])->name('admin.choose.view');
    Route::post('choose/update', [ChooseController::class, 'update'])->name('admin.choose.update');

    Route::delete('choose/delete/{id}', [ChooseController::class, 'delete'])->name('admin.choose.delete');



    Route::get('social', [SocialController::class, 'index'])->name('admin.social');
    Route::get('social/create', [SocialController::class, 'create'])->name('admin.social.create');

Route::post('social/store', [SocialController::class, 'store'])->name('admin.social.store');


//unique
Route::post('/select-sub-Category',[SocialController::class,'selectSubcategory'])->name('admin.subcategory.selectSubcategory');
//unique



    Route::get('social/edit/{id}', [SocialController::class, 'edit'])->name('admin.social.edit');
    Route::post('social/update/', [SocialController::class, 'update'])->name('admin.social.update');

    Route::delete('social/delete/{id}', [SocialController::class, 'delete'])->name('admin.social.delete');


   


    


    Route::get('team', [TeamController::class, 'index'])->name('admin.team');
    Route::get('team/create', [TeamController::class, 'create'])->name('admin.team.create');
    Route::post('team/store', [TeamController::class, 'store'])->name('admin.team.store');
    Route::get('team/edit/{id}', [TeamController::class, 'edit'])->name('admin.team.edit');
    Route::post('team/update/', [TeamController::class, 'update'])->name('admin.team.update');

    Route::delete('team/delete/{id}', [TeamController::class, 'delete'])->name('admin.team.delete');


Route::get('team_social_link', [SocialtController::class, 'index'])->name('admin.team_social_link');
    Route::get('team_social_link/create', [SocialtController::class, 'create'])->name('admin.team_social_link.create');
    Route::post('team_social_link/store', [SocialtController::class, 'store'])->name('admin.team_social_link.store');
    Route::get('team_social_link/edit/{id}', [SocialtController::class, 'edit'])->name('admin.team_social_link.edit');
    Route::post('team_social_link/update/', [SocialtController::class, 'update'])->name('admin.team_social_link.update');

    Route::delete('team_social_link/delete/{id}', [SocialtController::class, 'delete'])->name('admin.team_social_link.delete');


    Route::get('feature', [FeatureController::class, 'index'])->name('admin.feature');
    Route::get('feature/create', [FeatureController::class, 'create'])->name('admin.feature.create');
    Route::post('feature/store', [FeatureController::class, 'store'])->name('admin.feature.store');
    Route::get('feature/edit/{id}', [FeatureController::class, 'edit'])->name('admin.feature.edit');
    Route::put('feature/update/{id}', [FeatureController::class, 'update'])->name('admin.feature.update');

    Route::delete('feature/delete/{id}', [FeatureController::class, 'delete'])->name('admin.feature.delete');


    Route::get('review', [ReviewController::class, 'index'])->name('admin.review');
    Route::get('review/create', [ReviewController::class, 'create'])->name('admin.review.create');
    Route::post('review/store', [ReviewController::class, 'store'])->name('admin.review.store');
    Route::get('review/edit/{id}', [ReviewController::class, 'edit'])->name('admin.review.edit');
    Route::post('review/update', [ReviewController::class, 'update'])->name('admin.review.update');

    Route::delete('review/delete/{id}', [ReviewController::class, 'delete'])->name('admin.review.delete');



    Route::get('client_logo', [ClientlogoController::class, 'index'])->name('admin.client_logo');
    Route::get('client_logo/create', [ClientlogoController::class, 'create'])->name('admin.client_logo.create');
    Route::post('client_logo/store', [ClientlogoController::class, 'store'])->name('admin.client_logo.store');
    Route::get('client_logo/edit/{id}', [ClientlogoController::class, 'edit'])->name('admin.client_logo.edit');
    Route::post('client_logo/update', [ClientlogoController::class, 'update'])->name('admin.client_logo.update');

    Route::delete('client_logo/delete/{id}', [ClientlogoController::class, 'delete'])->name('admin.client_logo.delete');


    Route::get('news', [NewsController::class, 'index'])->name('admin.news');
    Route::get('news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('news/update/', [NewsController::class, 'update'])->name('admin.news.update');

    Route::delete('news/delete/{id}', [NewsController::class, 'delete'])->name('admin.news.delete');



    Route::get('contact', [ContactController::class, 'index'])->name('admin.contact');
   
    
   

    Route::delete('contact/delete/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');


     Route::get('about', [AboutController::class, 'index'])->name('admin.about');
    Route::get('about/create', [AboutController::class, 'create'])->name('admin.about.create');
    Route::post('about/store', [AboutController::class, 'store'])->name('admin.about.store');
    Route::get('about/edit/{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::post('about/update/', [AboutController::class, 'update'])->name('admin.about.update');

    Route::delete('about/delete/{id}', [AboutController::class, 'delete'])->name('admin.about.delete');



     Route::get('portfolio_category', [PcatController::class, 'index'])->name('admin.portfolio_category');
    Route::get('portfolio_category/create', [PcatController::class, 'create'])->name('admin.portfolio_category.create');
    Route::post('portfolio_category/store', [PcatController::class, 'store'])->name('admin.portfolio_category.store');
    Route::get('portfolio_category/edit/{id}', [PcatController::class, 'edit'])->name('admin.portfolio_category.edit');
    Route::post('portfolio_category/update/', [PcatController::class, 'update'])->name('admin.portfolio_category.update');

    Route::delete('portfolio_category/delete/{id}', [PcatController::class, 'delete'])->name('admin.portfolio_category.delete');


    Route::get('service_category', [ScatController::class, 'index'])->name('admin.service_category');
    Route::get('service_category/create', [ScatController::class, 'create'])->name('admin.service_category.create');
    Route::post('service_category/store', [ScatController::class, 'store'])->name('admin.service_category.store');
    Route::get('service_category/edit/{id}', [ScatController::class, 'edit'])->name('admin.service_category.edit');
    Route::post('service_category/update/', [ScatController::class, 'update'])->name('admin.service_category.update');

    Route::delete('service_category/delete/{id}', [ScatController::class, 'delete'])->name('admin.service_category.delete');


    Route::get('service', [SController::class, 'index'])->name('admin.service');
    Route::get('service/create', [SController::class, 'create'])->name('admin.service.create');
    Route::post('service/store', [SController::class, 'store'])->name('admin.service.store');
    Route::get('service/edit/{id}', [SController::class, 'edit'])->name('admin.service.edit');

    Route::get('service/view/{id}', [SController::class, 'view'])->name('admin.service.view');

    Route::post('service/update/', [SController::class, 'update'])->name('admin.service.update');

    Route::delete('service/delete/{id}', [SController::class, 'delete'])->name('admin.service.delete');


    Route::get('portfolio', [PController::class, 'index'])->name('admin.portfolio');
    Route::get('portfolio/create', [PController::class, 'create'])->name('admin.portfolio.create');
    Route::post('portfolio/store', [PController::class, 'store'])->name('admin.portfolio.store');
    Route::get('portfolio/edit/{id}', [PController::class, 'edit'])->name('admin.portfolio.edit');

    Route::get('portfolio/view/{id}', [PController::class, 'view'])->name('admin.portfolio.view');

    Route::post('portfolio/update/', [PController::class, 'update'])->name('admin.portfolio.update');

    Route::delete('portfolio/delete/{id}', [PController::class, 'delete'])->name('admin.portfolio.delete');








    Route::get('profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::post('password/update',[ProfileController::class, 'updatePassword'])->name('admin.password.update');

    









    // Login Routes
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',[LoginController::class,'login'])->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit',[LoginController::class,'logout'])->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset',[ForgetPasswordController::class,'showLinkRequestForm'])->name('admin.password.request');
    
});
