<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductGalleryController as AdminProductGalleryController;
use App\Http\Controllers\Admin\SertifikatController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\WithdrawController as AdminWithdrawController;
use App\Http\Controllers\Admin\CategoryController as SellerCategoryController;
use App\Http\Controllers\Admin\SliderController as SellerSliderController;
use App\Http\Controllers\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Admin\ProductController as SellerProductController;
use App\Http\Controllers\Admin\ProductGalleryController as SellerProductGalleryController;
use App\Http\Controllers\Admin\TransactionController as SellerTransactionController;
use App\Http\Controllers\Admin\UserController as SellerUserController;
use App\Http\Controllers\Admin\WithdrawController as SellerWithdrawController;
use App\Http\Controllers\Admin\UserBaruController;
use App\Http\Controllers\API\testcontroller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardWithdrawController;

use App\Http\Controllers\DashboardRefundController;

use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\Portofolio\BiodataController;
use App\Http\Controllers\Portofolio\KepanitiaanController;
use App\Http\Controllers\Portofolio\OrganisasiController;
use App\Http\Controllers\Portofolio\PendidikanController;
use App\Http\Controllers\Portofolio\ExperiencesController;
use App\Http\Controllers\Portofolio\ProjectsController;
use App\Http\Controllers\Portofolio\SkillController;
use App\Http\Controllers\Portofolio\SettingController;
use App\Models\Category;
use App\Models\Pendidikan;
use App\Models\Prodi;
use App\Models\Project;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [CategoryController::class, 'detail'])->name('categories-detail');
Route::get('/portofolio', [PortofolioController::class, 'index'])->name('portofolio');
Route::get('/portofolio/{id}', [PortofolioController::class, 'detail'])->name('portofolio-detail');

Route::get('/listproduct', [ListProductController::class, 'index'])->name('listproduct');

Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');
Route::post('/details/{product}', [DetailController::class, 'add'])->name('detail-add');

Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('profile');

Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');

Route::get('/success', [CartController::class, 'success'])->name('success');

Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');



Route::group(['middleware' => ['auth']], function(){

    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::patch('/cart/{cart}', [CartController::class, 'updateQuantity'])->name('cart-update-quantity');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');

    Route::get('ongkir/{regencies_id}', [CartController::class, 'cekOngkir'])->name('api-cek-ongkir');

    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/products', [DashboardProductController::class, 'index'])->name('dashboard-product');
    Route::get('/dashboard/products/create', [DashboardProductController::class, 'create'])->name('dashboard-product-create');
    Route::post('/dashboard/products', [DashboardProductController::class, 'store'])->name('dashboard-product-store');
    Route::get('/dashboard/products/{id}', [DashboardProductController::class, 'details'])->name('dashboard-product-details');
    Route::post('/dashboard/products/{id}', [DashboardProductController::class, 'update'])->name('dashboard-product-update');
    Route::get('/dashboard/products/delete/{id}', [DashboardProductController::class, 'delete'])->name('dashboard-product-delete');

    Route::post('/dashboard/products/gallery/upload', [DashboardProductController::class, 'uploadGallery'])->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/products/gallery/delete/{id}', [DashboardProductController::class, 'deleteGallery'])->name('dashboard-product-gallery-delete');

    Route::get('/dashboard/setting', [DashboardSettingController::class, 'store'])->name('dashboard-setting-store');
    Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])->name('dashboard-setting-account');
    Route::post('/dashboard/account/{redirect}', [DashboardSettingController::class, 'update'])->name('dashboard-setting-redirect');

    Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])->name('dashboard-transaction');
    Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transaction-details');
    Route::post('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'update'])->name('dashboard-transaction-update');


    Route::get('/dashboard/withdraw', [DashboardWithdrawController::class, 'index'])->name('dashboard-withdraw');
    Route::get('/dashboard/withdraw/create', [DashboardWithdrawController::class, 'create'])->name('dashboard-withdraw-create');
    Route::get('/dashboard/withdraw/edit/{id}', [DashboardWithdrawController::class, 'edit'])->name('dashboard-withdraw-edit');
    Route::post('/dashboard/withdraw', [DashboardWithdrawController::class, 'store'])->name('dashboard-withdraw-store');


    Route::get('/dashboard/refund', [DashboardRefundController::class, 'index'])->name('dashboard-refund');
    Route::get('/dashboard/refund/create', [DashboardRefundController::class, 'create'])->name('dashboard-refund-create');
    Route::get('/dashboard/refund/edit/{id}', [DashboardRefundController::class, 'edit'])->name('dashboard-refund-edit');
    Route::post('/dashboard/refund', [DashboardRefundController::class, 'store'])->name('dashboard-refund-store');
    
    Route::get('/dashboard/portofolio/biodata/create', [BiodataController::class, 'create'])->name('portofolio-biodata-create');
    Route::post('/dashboard/portofolio/biodata', [BiodataController::class, 'store'])->name('portofolio-biodata-store');
    Route::get('/dashboard/portofolio/biodata', [BiodataController::class, 'index'])->name('portofolio-biodata');

    Route::get('/dashboard/portofolio/kepanitiaan', [KepanitiaanController::class, 'index'])->name('portofolio-kepanitiaan');
    Route::get('/dashboard/portofolio/kepanitiaan/{id}', [KepanitiaanController::class, 'detail'])->name('portofolio-kepanitiaan-detail');
    Route::get('/dashboard/portfolio/kepanitiaan/create', [KepanitiaanController::class, 'create'])->name('portofolio-kepanitiaan-create');
    Route::post('/dashboard/portofolio/kepanitiaan', [KepanitiaanController::class, 'store'])->name('portofolio-kepanitiaan-store');
    Route::get('/dashboard/portofolio/kepanitiaan/edit/{id}', [KepanitiaanController::class, 'edit'])->name('portofolio-kepanitiaan-edit'); 
    Route::post('/dashboard/portofolio/kepanitiaan/{id}', [KepanitiaanController::class, 'update'])->name('portofolio-kepanitiaan-update');
    Route::get('/dashboard/portofolio/kepanitiaan/delete/{id}', [KepanitiaanController::class, 'destroy'])->name('portofolio-kepanitiaan-delete');

    Route::get('/dashboard/portofolio/organisasi', [OrganisasiController::class, 'index'])->name('portofolio-organisasi');
    Route::get('/dashboard/portofolio/organisasi/{id}', [OrganisasiController::class, 'detail'])->name('portofolio-organisasi-detail');
    Route::get('/dashboard/portfolio/organisasi/create', [OrganisasiController::class, 'create'])->name('portofolio-organisasi-create');
    Route::post('/dashboard/portofolio/organisasi', [OrganisasiController::class, 'store'])->name('portofolio-organisasi-store');
    Route::get('/dashboard/portofolio/organisasi/edit/{id}', [OrganisasiController::class, 'edit'])->name('portofolio-organisasi-edit'); 
    Route::post('/dashboard/portofolio/organisasi/{id}', [OrganisasiController::class, 'update'])->name('portofolio-organisasi-update');
    Route::get('/dashboard/portofolio/organisasi/delete/{id}', [OrganisasiController::class, 'destroy'])->name('portofolio-organisasi-delete');

    Route::get('/dashboard/portofolio/pendidikan', [PendidikanController::class, 'index'])->name('portofolio-pendidikan');
    Route::get('/dashboard/portfolio/pendidikan/create', [PendidikanController::class, 'create'])->name('portofolio-pendidikan-create');
    Route::post('/dashboard/portofolio/pendidikan', [PendidikanController::class, 'store'])->name('portofolio-pendidikan-store');
    Route::get('/dashboard/portofolio/pendidikan/edit/{id}', [PendidikanController::class, 'edit'])->name('portofolio-pendidikan-edit'); 
    Route::post('/dashboard/portofolio/pendidikan/{id}', [PendidikanController::class, 'update'])->name('portofolio-pendidikan-update');
    Route::get('/dashboard/portofolio/pendidikan/delete/{id}', [PendidikanController::class, 'destroy'])->name('portofolio-pendidikan-delete');

    Route::get('/dashboard/portofolio/experiences', [ExperiencesController::class, 'index'])->name('portofolio-experiences');
    Route::get('/dashboard/portofolio/experiences/{id}', [ExperiencesController::class, 'detail'])->name('portofolio-experiences-detail');
    Route::get('/dashboard/portfolio/experiences/create', [ExperiencesController::class, 'create'])->name('portofolio-experiences-create');
    Route::post('/dashboard/portofolio/experiences', [ExperiencesController::class, 'store'])->name('portofolio-experiences-store');
    Route::get('/dashboard/portofolio/experiences/edit/{id}', [ExperiencesController::class, 'edit'])->name('portofolio-experiences-edit'); 
    Route::post('/dashboard/portofolio/experiences/{id}', [ExperiencesController::class, 'update'])->name('portofolio-experiences-update');
    Route::get('/dashboard/portoffolio/experiences/delete/{id}', [PendidikanController::class, 'destroy'])->name('portofolio-experiences-delete');

    Route::get('/dashboard/portofolio/projects', [ProjectsController::class, 'index'])->name('portofolio-projects');
    Route::get('/dashboard/portofolio/projects/{id}', [ProjectsController::class, 'detail'])->name('portofolio-projects-detail'); 
    Route::get('/dashboard/portfolio/projects/create', [ProjectsController::class, 'create'])->name('portofolio-projects-create');
    Route::post('/dashboard/portofolio/projects', [ProjectsController::class, 'store'])->name('portofolio-projects-store');
    Route::get('/dashboard/portofolio/project/edit/{id}', [ProjectsController::class, 'edit'])->name('portofolio-project-edit'); 
    Route::post('/dashboard/portofolio/project/{id}', [ProjectsController::class, 'update'])->name('portofolio-project-update'); 
    Route::get('/dashboard/portofolio/project/delete/{id}', [ProjectsController::class, 'destroy'])->name('portofolio-project-delete');
    
    Route::get('/dashboard/portofolio/skills', [SkillController::class, 'index'])->name('portofolio-skills');
    Route::get('/dashboard/portfolio/skill/create', [SkillController::class, 'create'])->name('portofolio-skill-create');
    Route::post('/dashboard/portofolio/skill', [SkillController::class, 'store'])->name('portofolio-skill-store');
    Route::get('/dashboard/portofolio/skill/delete/{id}', [SkillController::class, 'destroy'])->name('portofolio-skill-delete');

    Route::get('/dashboard/portofolio/setting', [SettingController::class,'index'])->name('portofolio-setting');
    Route::post('/dashboard/portofolio/setting/update', [SettingController::class, 'update'])->name('portofolio-setting-update');
});


Route::prefix('admin')
    ->namespace('')
    ->middleware(['auth', 'admin'])
    ->group(function(){
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin-dashboard');
        Route::resource('category', AdminCategoryController::class);
        Route::resource('slider', AdminSliderController::class);
        Route::resource('user', AdminUserController::class);
        Route::resource('slider', AdminSliderController::class);
        Route::resource('product', AdminProductController::class);
        Route::resource('product-gallery', AdminProductGalleryController::class);
        Route::resource('transaction', AdminTransactionController::class);
        Route::resource('withdraw', AdminWithdrawController::class);

        //user baru
        Route::resource('user-baru', UserBaruController::class);
        Route::get('/user-baru/status/{id}/{status_code}', [UserBaruController::class, 'updateStatus'])->name('update-status-baru');
        Route::resource('sertifikat', SertifikatController::class);
    });

Route::prefix('seller')
    ->namespace('')
    ->middleware(['auth', 'seller'])
    ->group(function(){
        Route::get('/', [SellerDashboardController::class, 'index'])->name('seller-dashboard');
        Route::resource('category', AdminCategoryController::class);
        Route::resource('slider', AdminSliderController::class);
        Route::resource('user', AdminUserController::class);
        Route::resource('slider', AdminSliderController::class);
        Route::resource('product', AdminProductController::class);
        Route::resource('product-gallery', AdminProductGalleryController::class);
        Route::resource('transaction', AdminTransactionController::class);
        Route::resource('withdraw', AdminWithdrawController::class);

        //user baru
        Route::resource('user-baru', UserBaruController::class);
        Route::get('/user-baru/status/{id}/{status_code}', [UserBaruController::class, 'updateStatus'])->name('update-status-baru');
    });

Route::prefix('buyer')
    ->namespace('')
    ->middleware(['auth', 'buyer'])
    ->group(function(){
        Route::get('/', [AdminDashboardController::class, 'index'])->name('buyer-dashboard');
        Route::resource('category', AdminCategoryController::class);
        Route::resource('slider', AdminSliderController::class);
        Route::resource('user', AdminUserController::class);
        Route::resource('slider', AdminSliderController::class);
        Route::resource('product', AdminProductController::class);
        Route::resource('product-gallery', AdminProductGalleryController::class);
        Route::resource('transaction', AdminTransactionController::class);
        Route::resource('withdraw', AdminWithdrawController::class);

        //user baru
        Route::resource('user-baru', UserBaruController::class);
        Route::get('/user-baru/status/{id}/{status_code}', [UserBaruController::class, 'updateStatus'])->name('update-status-baru');
    });



Auth::routes();
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/test', [testcontroller::class, 'login']);
