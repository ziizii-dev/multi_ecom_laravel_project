<?php

namespace App\Http\Controllers\Backend;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
;
use App\Models\MultiImg;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //all product
    public function allProduct(){
        // $products = Product::where('status',1)->latest()->get();
        $products = Product::where('delete_status',1)->latest()->get();
        return view('backend.product.product_all',compact('products'));
}//End Method
//add product
public function addProduct(){
    $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
    $brands = Brand::latest()->get();
    $categories= Category::latest()->get();

    return view('backend.product.product_add',compact('brands','categories','activeVendor'));
}//End Method




//Store Product
public function storeProduct(Request $request){

    $this->storeProductValidationCheck($request);
    $image = $request->file('product_thambnail');
    $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$fileName);
    $save_url = 'upload/products/thambnail/'.$fileName;

    $product_id = Product::insertGetId([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_name'=>$request->product_name,
            'product_slug'=>strtolower(str_replace(' ','-',$request->product_name)),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags'=>$request->product_tags,
            'product_size'=>$request->product_size,
            'product_color'=>$request->product_color,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp'=>$request->short_descp,
            'long_descp'=>$request->long_descp,
            'product_thambnail'=>$save_url,
            'vendor_id'=>$request->vendor_id,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'status'=>1,
            'created_at'=>Carbon::now(),




    ]);

    $images = $request->file('multi_img');
    // dd($images);
    foreach($images as $img){
        $multiImg = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$multiImg);
        $uploadPath = 'upload/products/multi-image/'.$multiImg;
        MultiImg::insert([
            'product_id'=>$product_id,
            'photo_name'=> $uploadPath,
            'created_at' =>Carbon::now(),
        ]);
    };//End foreach
    $notification = array(
        'message'=>"Product Inserted Successfully",
        'alert-type'=>'success'
    );
    return redirect()->route('all#product')->with($notification);

}//End Method

//Edit product
public function editProduct($id){
    $multiImgs = MultiImg::where('product_id',$id)->where('delete_status',1)->get();
    $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
    $brands = Brand::latest()->get();
    $categories= Category::latest()->get();
    $subcategory= SubCategory::latest()->get();
    $products = Product::findOrFail($id);

    return view('backend.product.product_edit',compact('brands','categories','activeVendor','products','subcategory','multiImgs'));
}//End method
//update product
public function updateProduct(Request $request){
    $this->updateProductValidationCheck($request);
    $product_id = $request->id;
                Product::findOrFail($product_id)->update([
        'brand_id'=>$request->brand_id,
        'category_id'=>$request->category_id,
        'subcategory_id'=>$request->subcategory_id,
        'product_name'=>$request->product_name,
        'product_slug'=>strtolower(str_replace(' ','-',$request->product_name)),
        'product_code'=>$request->product_code,
        'product_qty'=>$request->product_qty,
        'product_tags'=>$request->product_tags,
        'product_size'=>$request->product_size,
        'product_color'=>$request->product_color,
        'selling_price'=>$request->selling_price,
        'discount_price'=>$request->discount_price,
        'short_descp'=>$request->short_descp,
        'long_descp'=>$request->long_descp,
        'vendor_id'=>$request->vendor_id,
        'hot_deals'=>$request->hot_deals,
        'featured'=>$request->featured,
        'special_offer'=>$request->special_offer,
        'special_deals'=>$request->special_deals,
        'status'=>1,
        'created_at'=>Carbon::now(),




]);
$notification = array(
    'message'=>"Product Without Images Updated  Successfully",
    'alert-type'=>'success'
);
return redirect()->route('all#product')->with($notification);
}//End Method

//Update product thambnail
public function updateProductThambnail(Request $request){
//   $this->updateProductThambnailValidationCheck($request);
    $pro_id = $request->id;
    $oldImage = $request->old_img;
    $image = $request->file('product_thambnail');
    if($image){
        $fileName = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(800,800)->save('upload/products/thambnail/'.$fileName);
        $save_url = 'upload/products/thambnail/'.$fileName;
        if(file_exists($oldImage)){
            unlink($oldImage);
        }else{
            return "there is no data";
        };
        Product::findOrFail($pro_id)->update([
            'product_thambnail'=>$save_url,
            'updated_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message'=>"Product  Image Thambnail Updated  Successfully",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    } else{
        $notification = array(
            'message'=>"There is no image data",
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);
    };

}//End Method

//Update Multi Image
public function updateProductMultiImage(Request $request){
    $imgs = $request->multi_img;
    // dd($imgs);
    if($imgs){
        foreach ($imgs as $id=>$img ){
            $imgDel = MultiImg::findOrFail($id);
            // unlink($imgDel->photo_name);
            $multiImg = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(800,800)->save('upload/products/multi-image/'.$multiImg);
            $uploadPath = 'upload/products/multi-image/'.$multiImg;
            MultiImg::where('id',$id)->update([
                'photo_name'=>$uploadPath,
                'created_at'=>Carbon::now(),
            ]);
        };//End foreach
        $notification = array(
            'message'=>"Product  Multi Image  Updated  Successfully",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

    } else{
        $notification = array(
            'message'=>"There is no image data!",
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notification);

    };



}//End Method

//Delete Multi Image
public function deleteProductMultiImage($id){
          $oldImg =MultiImg::findOrFail($id);
        //   return $oldImg;
        //   unlink($oldImg->photo_name);
        //   MultiImg::findOrFail($id)->delete();
        if(isset($oldImg)){
            $oldImg->delete_status = 0;
            $notification = array(
                'message'=>"Product  Multi Image  Deleted  Successfully",
                'alert-type'=>'success'
            );
            if($oldImg->save()){
                return redirect()->back()->with($notification);
            };

        }

}//End method
//Inactive Product
public function productInactive($id){
         Product::findOrFail($id)->update([
            'status'=>0,
         ]);
         $notification = array(
            'message'=>"Product Inactive Successfully",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
}//End Method
//Active Product
public function productActive($id){
    Product::findOrFail($id)->update([
       'status'=>1,
    ]);
    $notification = array(
       'message'=>"Product Active Successfully",
       'alert-type'=>'success'
   );
   return redirect()->back()->with($notification);
}//End Method

//   return $oldImg;
//   unlink($oldImg->photo_name);
//   MultiImg::findOrFail($id)->delete();

//Delete Product
public function deleteProduct($id){
         $product = Product::findOrFail($id);
        //  unlink($product->product_thambnail);
        //  Product::findOrFail($id)->delete();
            $product->delete_status = 0;

        $product->save();

            $imgs = MultiImg::where('product_id',$id)->get();
// return $imgs;
                        foreach($imgs as $img){
                            // unlink($img->photo_name);

                                $img->delete_status = 0;
                                $img->save();

                            // $img->delete_status = 0;
                            // MultiImg::where('product_id',$id)->delete();
        };

        $notification = array(
            'message'=>"Product Deleted Successfully",
            'alert-type'=>'success'
        );
            return redirect()->back()->with($notification);

}//End method
//Validation
private function storeProductValidationCheck($request){
    Validator::make($request->all(),[
        "brand_id" =>"required",
        "category_id" =>"required",
        "subcategory_id" =>"required",
        "product_name" =>"required",
        "product_code" =>"required",
        "product_qty" =>"required",
        "selling_price" =>"required",
        "discount_price" =>"required",
        "short_descp" =>"required",
        "long_descp" =>"required",
        "product_thambnail" =>'required| mimes:jpeg,jpg,png,webp,gif',
        // "multi_img"=>'required',




    ])->Validate();
 }//End method
              //Validation
private function updateProductValidationCheck($request){
    Validator::make($request->all(),[
        "brand_id" =>"required",
        "category_id" =>"required",
        "subcategory_id" =>"required",
        "product_name" =>"required",
        "product_code" =>"required",
        "product_qty" =>"required",
        "selling_price" =>"required",
        "discount_price" =>"required",
        "short_descp" =>"required",
        "long_descp" =>"required",

    ])->Validate();
 }//End
//  private function updateProductThambnailValidationCheck($request){
//     Validator::make($request->all(),[
//         "old_img" =>"required"

//     ])->Validate();
//  }//End
 //
}
