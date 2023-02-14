<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\VendorProductController;

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

Route::get('/', function () {
    return view('frontend.index');
});
//Group Middleware
Route::middleware(['auth'])->group(function(){
    Route::controller(UserController::class)->group(function(){

            Route::get('/dashboard','userDashboard')->name('dashboard');
            Route::post('/user/profile/store','userProfileStore')->name('user#profileStore');
            Route::get('/user/logout','userLogout')->name('user#logout');
            Route::post('/user/update/password','updatePassword')->name('user#updatePassword');

    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Admin
Route::middleware(['auth','role:admin'])->group(function(){
Route::controller(AdminController::class)->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard','adminDeshboard')->name('admin#deshboard');
        Route::get('/logout','adminDestroy')->name('admin#logout');
        Route::get('/profile','adminProfile')->name('admin#profile');
        Route::post('/profile/store','adminProfileStore')->name('admin#profileStore');
        Route::get('/change/password','adminChangePassword')->name('admin#changePassword');
        Route::post('/update/password','updatePassword')->name('admin#updatePassword');
    });
});
});//End

//Admin backend Brand
Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(BrandController::class)->group(function(){
        Route::prefix('brand')->group(function(){
            Route::get('/all','allBrand')->name('all#brand');
            Route::get('/add','addBrand')->name('add#brand');
            Route::post('/store','storeBrand')->name('store#brand');
            Route::get('/edit/{id}','editBrand')->name('edit#brand');
            Route::post('/update','updateBrand')->name('update#brand');
            Route::get('/delete/{id}','deleteBrand')->name('delete#brand');

        });
    });

    });

    //Admin backend Category all route
    Route::middleware(['auth','role:admin'])->group(function(){
    Route::controller(CategoryController::class)->group(function(){
        Route::prefix('category')->group(function(){
            Route::get('/all','allCategory')->name('all#category');
            Route::get('/add','addCategory')->name('add#category');
            Route::post('/store','storeCategory')->name('store#category');
            Route::get('/edit/{id}','editCategory')->name('edit#category');
            Route::post('/update','updateCategory')->name('update#category');
            Route::get('/delete/{id}','deleteCategory')->name('delete#category');


        });
    });

    });//End
    //Admin backend SubCategory all route
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(SubCategoryController::class)->group(function(){
            Route::prefix('subcategory')->group(function(){
                Route::get('/all','allSubCategory')->name('all#subcategory');
                Route::get('/add','addSubCategory')->name('add#subcategory');
                Route::post('/store','storeSubCategory')->name('store#subcategory');
                Route::get('/edit/{id}','editSubCategory')->name('edit#subcategory');
                Route::post('/update','updateSubCategory')->name('update#subcategory');
                Route::get('/delete/{id}','deleteSubCategory')->name('delete#subcategory');
                Route::get('/ajax/{category_id}','getSubCategory')->name('subcategoryData');

            });
        });

        });//End
    //Admin backend Vendor Active and Inavtive Manage all route
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(AdminController::class)->group(function(){
                Route::get('/inactive/vendor','inactiveVendor')->name('inactive#vendor');
                Route::get('/active/vendor','activeVendor')->name('active#vendor');
                Route::get('/inactive/vendor/detail/{id}','inactiveVendorDetail')->name('inactive#vendorDetails');
                Route::post('/active/vendor/approve','activeVendorApprove')->name('active#vendorApprove');
                Route::get('/active/vendor/detail/{id}','activeVendorDetail')->name('active#vendorDetails');
                Route::post('/inactive/vendor/approve','inactiveVendorApprove')->name('inactive#vendorApprove');

        });

        });//End

        //Admin backend Product  all route
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(ProductController::class)->group(function(){
            Route::prefix('product')->group(function(){
                Route::get('/all','allProduct')->name('all#product');
                Route::get('/add','addProduct')->name('add#product');
                Route::post('/store','storeProduct')->name('store#product');
                Route::get('/edit/{id}','editProduct')->name('edit#product');
                Route::post('/update','updateProduct')->name('update#product');
                Route::post('/update/thambnail','updateProductThambnail')->name('update#productThambnail');
                Route::post('/update/multi/image','updateProductMultiImage')->name('update#productMultiImage');
                Route::get('/update/multi/image/delete/{id}','deleteProductMultiImage')->name('product#multiImgeDelete');
                Route::get('/inactive/{id}','productInactive')->name('product#inactive');
                Route::get('/active/{id}','productActive')->name('product#active');
                Route::get('/delete/{id}','deleteProduct')->name('delete#product');






        });
    });

        });//End

        //Vendor Dashboard //Vendor all routes
Route::middleware(['auth','role:vendor'])->group(function(){

Route::controller(VendorController::class)->group(function(){
    Route::prefix('vendor')->group(function(){
        Route::get('/dashboard','vendorDeshboard')->name('vendor#deshboard');
        Route::get('/logout','vendorDestroy')->name('vendor#logout');
        Route::get('/profile','vendorProfile')->name('vendor#profile');
        Route::post('/profile/store','vendorProfileStore')->name('vendor#profileStore');
        Route::post('/profile/store','vendorProfileStore')->name('vendor#profileStore');
        Route::get('/change/password','vendorChangePassword')->name('vendor#changePassword');
        Route::post('/update/password','updatePassword')->name('vendor#updatePassword');
    });
});//End vendorcontroller
//Vendor AddProductController start
Route::controller(VendorProductController::class)->group(function(){
    Route::prefix('vendor')->group(function(){
        Route::get('/all/product','vendorAllProduct')->name('vendor#allProduct');
        Route::get('/add/product','vendorAddProduct')->name('vendor#addProduct');
        Route::get('/subcategory/ajax/{category_id}','vendorGetSubCategory')->name('vendor#subcategoryData');
        Route::post('/store/product','vendorStoreProduct')->name('vendor#Storeproduct');
        Route::get('/edit/product/{id}','vendorEditProduct')->name('vendor#editProduct');
        Route::post('/update/product','vendorUpdateProduct')->name('vendor#updateProduct');




    });
});//End vendorProductcontroller

});//End Middleware

Route::get('admin/login',[AdminController::class,'adminLogin'])->name('admin#login')->middleware(RedirectIfAuthenticated::class);
Route::get('vendor/login',[VendorController::class,'vendorLogin'])->name('vendor#login')->middleware(RedirectIfAuthenticated::class);
Route::get('become/vendor',[VendorController::class,'becomeVendor'])->name('become#vendor');
Route::post('vendor/register',[VendorController::class,'vendorRegister'])->name('vendor#register');
