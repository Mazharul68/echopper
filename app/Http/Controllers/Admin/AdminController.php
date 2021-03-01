<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use carbon\carbon;
use app\models\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }
    ////Admin Profile Here
    public function admin_profile(){
    	return view('admin.admin_profile.index');
    }
    /// Update Personal Profile
    public function update_data(Request $request){
    	$request-> validate([
    	'name'=>'required',
    	'email'=>'required',
    	'phone'=>'required',

    	],[
    		'name.required'=>'Input Your Name',
    	]);

    	User::findOrfail(Auth::id())->update([
    	'name'=>$request->name,
    	'email'=>$request->email,
    	'phone'=>$request->phone,
    	'updated_at'=> carbon::now(),
    	]);

    $notification=array(
     'message'=>'Admin Profile Successfully Updated',
     'alert-type'=>'success'
      );
    return Redirect()->back()->with($notification);
    }
    // Update Image Page Here

    public function UpdateImage(){

    return view('admin.admin_profile.change_image');
    }

    //Image Store Here

    public function imgStore( Request $request){

    	$old_image= $request->old_image;

     if(User::findOrFail(Auth::id())->image == 'frontend/img/baby.jpg'){

        $image =$request->file('image');
        $name_gen=uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('frontend/img/'.$name_gen);
        $save_url='frontend/img/'.$name_gen;
        User::findOrFail(Auth::id())->update([
            'image' => $save_url
        ]);

        $notification=array(
     'message'=>'Image Successfully Updated',
     'alert-type'=>'success'
      );
     return Redirect()->back()->with($notification);

    }else{
        unlink($old_image);
        $image = $request->file('image');
        $name_gen= uniqid().'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('frontend/img/'.$name_gen);
        $save_url= 'frontend/img/'.$name_gen;
        User::findOrfail(Auth::id())->update([
            'image' => $save_url,
        ]);

        $notification=array(
     'message'=>'Image Successfully Updated',
     'alert-type'=>'success'
      );
     return Redirect()->back()->with($notification);
     }
    }
    // Change Password Page Here

    public function ChangePassword(){
     return view('admin.admin_profile.password');
    }

    //change password here

    public function change_password(Request $request){

            $request->validate([

    'old_password' => 'required',
    'new_password' => 'required|min:8',
    'confirmation_password' => 'required|min:8',

    ]);

    $db_pass = Auth::user()->password;
    $current_password = $request->old_password;
    $new_pass = $request->new_password;
    $confirm_pass = $request->confirmation_password;

    if (Hash::check($current_password,$db_pass)) {

      if ($new_pass=== $confirm_pass) {

        User::findOrFail(Auth::id())->update([
        'password' => Hash::make($new_pass)
        ]);

        Auth::logout();

        $notification=array(
     'message'=>'New Password Change Success and now login with new password',
     'alert-type'=>'success'
      );
     return Redirect()->route('login')->with($notification);

      }else{
        $notification=array(
     'message'=>'New Password and confirm password not match',
     'alert-type'=>'error'
      );
     return Redirect()->back()->with($notification);
      }

    }else{
        $notification=array(
     'message'=>'Password Dose Not Match',
     'alert-type'=>'error'
      );
     return Redirect()->back()->with($notification);
     }
   }
   // All Users Show
   public function allUsers(){
    //    $users = user::where('role_id',2)->latest()->get();
       $users = user::where('role_id','!=',1)->latest()->get();

       return view('admin.user.all_users',compact('users'));
   }
   //User Banned
   public function userUnbanned($id){
    user::findOrFail($id)->update(['isban' =>0]);
    $notification=array(
        'message'=>'User Unbanned Success',
        'alert-type'=>'success'
         );
        return Redirect()->back()->with($notification);
   }
   //User UnBanned
   public function userBanned($id){
    user::findOrFail($id)->update(['isban' =>1]);
    $notification=array(
        'message'=>'User banned Success',
        'alert-type'=>'error'
         );
        return Redirect()->back()->with($notification);
   }
}

