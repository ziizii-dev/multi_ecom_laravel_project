<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Category;
use App\Models\ShipDivision;
use App\Models\ShipDistricts;
use App\Models\ShipState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ShippingAreaController extends Controller
{
     //all coupon
     public function allDivision(){
        $division = ShipDivision::where('delete_status',1)->latest()->get();

        return view('backend.ship.division.division_all',compact('division'));
    }//end method
     //Add coupon
     public function addDivision(){
        return view("backend.ship.division.division_add");
  }//End method

   ///Store coupon
   public function storeDivision(Request $request){
    // return $request;
    $this->divisionValidationCkeck($request);

         ShipDivision::insert([
            'division_name'=>$request->division_name,
            "created_at"=>Carbon::now()


         ]);
         $notification = array(
            'message'=>"Division inserted Successfully",
            'alert-type'=>'success'
        );
        return redirect()->route('all#division')->with($notification);
}//End Method

//Edit Division

public function editDivision($id){
    // $coupons= Coupon::where('status',1)->orderBy('coupon_name',"ASC")->get();
    $division = ShipDivision::findOrfail($id);
    return view('backend.ship.division.division_edit',compact('division'));
}//End Method


//Update division

public function updateDivision(Request $request){
    $division_id = $request->id;
    // return $coupon_id;
    $this->divisionValidationCkeck($request);

    ShipDivision::findOrFail($division_id)->update([
//    'coupon_id'=>$request->coupon_id,
   'division_name'=>$request->division_name,


]);
$notification = array(
   'message'=>"Division Updated Successfully",
   'alert-type'=>'success'
);
return redirect()->route('all#division')->with($notification);
}//End Method

  //Delete Division
  public function deleteDivision($id){

    $division = ShipDivision::findOrfail($id);

   if(isset($division)){
       $division->delete_status=0;
       $notification = array(
           'message'=>" Division Deleted Successfully",
           'alert-type'=>'success'
       );
       if($division->save()){
           return redirect()->back()->with($notification);
       }

   }
}//End method

 //Coupon validation
 private function divisionValidationCkeck($request){
    Validator::make($request->all(),[
        'division_name'=>'required|string',


    ])->Validate();
}
}
