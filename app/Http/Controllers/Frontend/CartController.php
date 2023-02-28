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
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    //Store add to cart
    public function addToCart(Request $request ,$id){
        $product = Product::where('delete_status',1)->findOrFail($id);

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }

    }// End Method
       //Store add to cart
       public function addToCartDetails(Request $request ,$id){
        $product = Product::where('delete_status',1)->findOrFail($id);

        if ($product->discount_price == NULL) {

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }else{

            Cart::add([

                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

   return response()->json(['success' => 'Successfully Added on Your Cart' ]);

        }

    }// End Method


    //Add MIni cart
    public function addMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json([
            'carts'=>$carts,
            'cartQty'=>$cartQty,
            'cartTotal'=>$cartTotal
        ]);
    }//End method
    //Remove minicart
    public function removeMiniCart($rowId){
        // return $rowId;
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);

    }// End Method

    //My cart
    public function myCart(){
        return view('frontend.mycart.view_mycart');
    }//End method
    //Get cart product

    public function getCartProduct(){

        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => $cartTotal

        ));

    }// End Method
    //Remove cart

    public function cartRemove($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Remove From Cart']);

    }// End Method


    //Cart decrement
    public function cartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId,$row->qty -1);
        return response()->json('Decrement');

    }//End method

    //Cart increment
    public function cartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId,$row->qty +1);
        return response()->json('Increment');

    }//End method




}
