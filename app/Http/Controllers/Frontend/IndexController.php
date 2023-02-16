<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    //froent product details
    public function productDetails($id,$slug){
        $product = Product::findOrFail($id);
        $color = $product->product_color;
        $product_color = explode (',',$color);
        $size = $product->product_size;
        $product_size = explode (',',$size);
        $multiImage = MultiImg:: where('delete_status',1)->where('product_id',$id)->get();
        $cat_id = $product ->category_id;
        $relatedProduct = Product::where('delete_status',1)
                                  ->where('category_id',$cat_id)
                                   ->where('id','!=',$id)
                                   ->orderBy('id','DESC')
                                   ->limit(4)->get();
        return view('frontend.product.product_details',compact('product','product_color','product_size','multiImage','relatedProduct'));

    }//End method
}
