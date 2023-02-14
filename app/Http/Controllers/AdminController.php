<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //Admin deshboard
    public function adminDeshboard(){
        return view('admin.index');
    }
    public function adminLogin(){
       return view('admin.admin_login');
    }//End

    public function adminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//End Method

    //Admin Profile
    public function adminProfile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }
    //Admin profile store

    public function adminProfileStore(Request $request){
         $this->profileValidationCheck($request);
        $data = User::where('id',Auth::user()->id)->first();
        $data ->name = $request->name;
        $data ->email = $request->email;
        $data ->phone = $request->phone;
        $data ->address = $request->address;
        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/'.$data->photo));
            $fileName = uniqid(). $request->file('photo')->getClientOriginalName();
            // dd ($fileName);
            $file->move(public_path('upload/admin_images'),$fileName);
            $data['photo']=$fileName;
        }
        $data->save();
        // dd($data->toArray());
        $notification = array(
            'message'=>"Admin Profile Updated Successfully",
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);

          }//End Menthod
          //Password change
          public function adminChangePassword(){

            return view('admin.admin_change_password');
          }
          //Update Password
        //   public function updatePassword(Request $request){
        //     // return $request;
        //     $this->passwordValidationCheck($request);
        //     $hasedPassword = Auth::user()->password;
        //     // dd($hasedPassword);
        //     // if(Hash::check($request->password,'=',$hasedPassword)){
        //     //    $users = User::find(Auth::id());
        //     //    $users->password = bcrypt($request->newPassword);
        //     //    $users->save();
        //     // }
        //     if(!Hash::check($request->pasword, Auth::user()->password)){
        //         return back()->with('error',"Password Doesn't Mathch!");
        //     }
        //     User::whereId(auth()->user()->id)->update([
        //           'password'=>Hash::make($request->newPassword)
        //     ]);

        //     $notification = array(
        //         'message'=>"Password Updated Successfully",
        //         'alert-type'=>'success'
        //     );
        //     return redirect()->back()->with($notification);

        // }
        public function updatePassword(Request $request){
            $this->passwordValidationCheck($request);
            $hasedPassword = Auth::user()->password;
            if(Hash::check($request->oldPassword, $hasedPassword)){
                $users = User::find(Auth::id());
                $users->password = bcrypt($request->newPassword);
                $users->save();
                 $notification = array(
                    'message'=>"Password Updated Successfully",
                    'alert-type'=>'success'
                );

                return back()->with($notification);

            } else{
                $notification = array(
                    'message'=>"Password does't match",
                    'alert-type'=>'warning'
                );

                return back()->with($notification);
            }

        } //End

        //Inactive Vendor
        public function inactiveVendor(){
            $inactiveVendor = User::where('status','inactive')->where('role','vendor')->latest()->get();
            return view('backend.vendor.inactive_vendor',compact('inactiveVendor'));
        }//End Method

        //Active Vendor
        public function activeVendor(){
            $activeVendor = User::where('status','active')->where('role','vendor')->latest()->get();
            return view('backend.vendor.active_vendor',compact('activeVendor'));
        }//End Method
        //Inactive Details
        public function inactiveVendorDetail($id){
            $inactiveVendorDetails = User::findOrFail($id);
            return view('backend.vendor.inactive_vendor_details',compact('inactiveVendorDetails'));

        }//End
        //Active Vendor Approve
        public function activeVendorApprove(Request $request){
            $vendor_id = $request->id;
            $user = User::findOrFail($vendor_id)->update([
                'status'=>'active',
            ]);
            $notification = array(
                'message'=>"Vendor Active Successfully",
                'alert-type'=>'success'
            );

            return redirect()->route('active#vendor')->with($notification);
        } //End
        //Inactive Details
        public function activeVendorDetail($id){
            $activeVendorDetails = User::findOrFail($id);
            return view('backend.vendor.active_vendor_details',compact('activeVendorDetails'));

        }//End
        //Active Vendor Approve
        public function inactiveVendorApprove(Request $request){
            $invendor_id = $request->id;
            $user = User::findOrFail($invendor_id)->update([
                'status'=>'inactive',
            ]);
            $notification = array(
                'message'=>"Vendor Inactive Successfully",
                'alert-type'=>'success'
            );

            return redirect()->route('inactive#vendor')->with($notification);
        } //End

          //Validation
          private function profileValidationCheck($request){
            Validator::make($request->all(),[
                'name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'address'=>'required',
                'photo'=>'mimes:jpeg,jpg,png,webp,gif'

            ])->Validate();
         }
         //Password Validation
         private function passwordValidationCheck($request){
            Validator::make($request->all(),[
                'oldPassword'=>'required',
                'newPassword'=>'required',
                'confirmPassword'=>'required|same:newPassword',

            ])->Validate();
         }

}
