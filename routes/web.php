<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\CompareController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\IndexController;
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

 //froent product details all route


 Route::controller(IndexController::class)->group(function(){
    Route::get('/product/details/{id}/{slug}','productDetails');
    Route::get('/','Index');
    Route::get('/vendor/details/{id}','vendorDetails')->name('vendor#details');
    Route::get('/vendor/all','vendorAll')->name('vendor#all');
    Route::get('/product/category/{id}/{slug}','catWiseProduct')->name('category#details');
    Route::get('/product/subcategory/{id}/{slug}','subCatWiseProduct');
    Route::get(' /product/view/model/{id}','productViewAjax');

});

// Route::get('/', function () {
//     return view('frontend.index');
// });
//Group Middleware
Route::middleware(['auth'])->group(function(){
    Route::controller(UserController::class)->group(function(){

            Route::get('/dashboard','userDashboard')->name('dashboard');
            Route::post('/user/profile/store','userProfileStore')->name('user#profileStore');
            Route::get('/user/logout','userLogout')->name('user#logout');
            Route::post('/user/update/password','updatePassword')->name('user#updatePassword');

    });
});//End Middleware

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

        //Admin backend Sliderr  all route
    Route::middleware(['auth','role:admin'])->group(function(){
        Route::controller(SliderController::class)->group(function(){
            Route::prefix('slider')->group(function(){
                Route::get('/all','allSlider')->name('all#slider');
                Route::get('/add','addSlider')->name('add#slider');
                Route::post('/store','storeSlider')->name('store#slider');
                Route::get('/edit/{id}','editSlider')->name('edit#slider');
                Route::post('/update','updateSlider')->name('update#slider');
                Route::get('/delete/{id}','deleteSlider')->name('delete#slider');



        });
    });//sliderController End
    //Admin backend Bannner all routes
    Route::controller(BannerController::class)->group(function(){
        Route::prefix('banner')->group(function(){
            Route::get('/all','allBanner')->name('all#banner');
            Route::get('/add','addBanner')->name('add#banner');
            Route::post('/store','storeBanner')->name('store#banner');
            Route::get('/edit/{id}','editBanner')->name('edit#banner');
            Route::post('/update','updateBanner')->name('update#banner');
            Route::get('/delete/{id}','deleteBanner')->name('delete#banner');



    });
});//bannerController End
//Coupon controller start
Route::controller(CouponController::class)->group(function(){
    Route::prefix('coupon')->group(function(){
        Route::get('/all','allCoupon')->name('all#coupon');
        Route::get('/add','addCoupon')->name('add#coupon');
        Route::post('/store','storeCoupon')->name('store#coupon');
        Route::get('/edit/{id}','editCoupon')->name('edit#coupon');
        Route::post('/update','updateCoupon')->name('update#coupon');
        Route::get('/delete/{id}','deleteCoupon')->name('delete#coupon');

});
});//couponController End




 });//Middleware End

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
        Route::post('/update/product/thambnail','vendorUpdateProductThambnail')->name('vendor#updateProductThambnail');
        Route::post('/update/product/multiImage','vendorUpdateProductMultiImage')->name('vendor#updateProductMultiImage');
        Route::get('/delete/product/multiImage/{id}','vendorDeleteProductMultiImage')->name('vendor#productMultiImgeDelete');
        Route::get('/inactive/{id}','vendorInactiveProduct')->name('vendor#productInactive');
        Route::get('/active/{id}','vendorActiveProduct')->name('vendor#productActive');
        Route::get('/delete/{id}','vendorDeleteProduct')->name('vendor#deleteProduct');





    });
});//End vendorProductcontroller

});//End Middleware

Route::get('admin/login',[AdminController::class,'adminLogin'])->name('admin#login')->middleware(RedirectIfAuthenticated::class);
Route::get('vendor/login',[VendorController::class,'vendorLogin'])->name('vendor#login')->middleware(RedirectIfAuthenticated::class);
Route::get('become/vendor',[VendorController::class,'becomeVendor'])->name('become#vendor');
Route::post('vendor/register',[VendorController::class,'vendorRegister'])->name('vendor#register');

Route::controller(CartController::class)->group(function(){
    Route::post('/cart/data/store/{id}','addToCart');
    Route::get('/product/mini/cart','addMiniCart');
    Route::get('/minicart/product/remove/{rowId}','removeMiniCart');
    Route::post('/dcart/data/store/{id}','addToCartDetails');
});


Route::controller(WishlistController::class)->group(function(){
    Route::post('/add-to-wishlist/{product_id}','addToWishList');
});
Route::controller(CompareController::class)->group(function(){
    Route::post('/add-to-compare/{product_id}','addToCompare');
});

 //User backend SubCategory all route
 Route::middleware(['auth','role:user'])->group(function(){
    Route::controller(WishlistController::class)->group(function(){
        Route::get('wishlist','allWishList')->name('all#wishlist');
        Route::get(' /get/wishlist/product','getWishlistProduct');
        Route::get('/wishlist/remove/{id}','wishlistRemove');

    });//end wishlist
    Route::controller(CompareController::class)->group(function(){
        Route::get('/compare','allCompare')->name('all#compare');
        Route::get(' /get/compare/product','getCompareProduct');
        Route::get('/compare/remove/{id}','compareRemove');


    });//end wishlist
//Cart route in user middleware
Route::controller(CartController::class)->group(function(){
    Route::get('/mycart','myCart')->name('mycart');
    Route::get('/get/cart/product/','getCartProduct');
    Route::get('/cart/remove/{rowId}' , 'cartRemove');
    Route::get('/cart/decrement/{rowId}' , 'cartDecrement');
    Route::get('/cart/increment/{rowId}' , 'cartIncrement');

});

    });//End user middleware
