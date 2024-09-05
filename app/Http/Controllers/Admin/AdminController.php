<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admins;
use Carbon\Carbon;
use Cookie;
use DB;
use Mail;
use File;
use Session;


class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $admindata = Admins::where('id',Session::get('ADMIN_LOGIN'))->first();
            view()->share([
                'admindata' =>$admindata,
            ]);
        return $next($request);    
        });
    }


    // Login From Controller

    public function login()
    {
        return view('admin.auth.login');
    }
     // Login Function 
     function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required',
             'password'=>'required'
        ]);
        $userInfo = Admins::where('email','=', $request->email)->first();
        if(!$userInfo){
            return back()->with('fail','We do not recognize your email address');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
            	
            	$request->session()->put('ADMIN_LOGIN', $userInfo->id);
                Session::put('ADMIN_NAME', $userInfo->name);
                $request->session()->put('ADMIN_IMAGE', $userInfo->image);
                if($request->remember=== null){
                    setcookie('adminemail',$request->email,100);
                    setcookie('adminpassword',$request->password,100);

                }else{
                    setcookie('adminemail',$request->email,time()+60*60*24*100);
                    setcookie('adminpassword',$request->password,time()+60*60*24*100);
                }
                return redirect('admin/dashboard');
            	 
            }else{
                return back()->with('fail','Incorrect email and password');
            }
        }
    }
    // public function dashboard()
    // {   
    //     $data=DB::table('users')->Paginate(10);
    //     return view('admin.auth.dashboard',['data'=>$data]);

    // }
    
    // Profile Edit 
    public function editprofile(){
        $data = ['ADMIN_LOGIN'=>Admins::where('id','=', session('ADMIN_LOGIN'))->first()];
        return view('admin.auth.edit-profile',$data);
    }

    //  Update Profile 
    public function uploadimage($location,$imagename){
        $name = $imagename->getClientOriginalName();
        $imagename->move( public_path().'/'.$location,date('ymdgis').$name);
        return date('ymdgis').$name;
       }

 
    function updateprofile(Request $request){
        //Validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
        ]);
        if ($request->hasFile('image')) {
            $user['image'] = $this->uploadimage('profile',$request['image']);
            $cmsimages = DB::table('admins')->where($request->id)->first();
            $cmsdel = public_path('profile/'.$cmsimages->image);
                if (File::exists($cmsdel)) {
                    File::delete($cmsdel);
                }

        }
       
         $user['name'] = $request->name;
         $user['email'] = $request->email;
         Admins::where('id','=', session('ADMIN_LOGIN'))->update($user);
         $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
      }
      //  Change Password

    function changepassword(){

        return view('admin.auth.change-password');  

    }

    //  Change Password

    function updatepassword(Request $request){
         
         
           $LoggedUserInfo = Admins::where('id','=', session('ADMIN_LOGIN'))->first();

           $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed', 
        ]);

         if(!Hash::check($request->old_password, $LoggedUserInfo->password)){
            return back()->with("error", "Old Password Doesn't Match!!");
        }
   
         $user['password'] = Hash::make($request->new_password);
         Admins::where('id','=', session('ADMIN_LOGIN'))->update($user);
         return back()->with("status", " Password Changed Successfully");
          
    }


    // Logout Functon
    function adminlogout(){
             $user['updated_at'] = date('Y-m-d H:i:s');
             Admins::where('id','=', session('ADMIN_LOGIN'))->update($user);
             session()->pull('ADMIN_LOGIN');
             return redirect('/admin/login')->with('logout','Logout successful');
    }

    //  Forgot Password ===================

    function forgotpassword(){
        return view('admin.auth.forgot-password');
    }


    public function sendPasswordResetToken(Request $request)
   {
      $user = Admins::where ('email', $request->email)->first();
       if ( !$user )
       {return redirect()->back()->with('error','Email not found');
       }

      //create a new token to be sent to the user. 
      DB::table('password_resets')->insert([
        'email' => $request->email,
        'token' => Str::random(40), //change 60 to any length you want
        'created_at' => Carbon::now()
       ]);
       //$users = Sentinel::findById($user->id);
       $users = Admins::where ('id', $user->id)->first();
       $token = DB::table('password_resets')
       ->where('email', $request->email)->first();

         // or $email = $tokenData->email;
        $this-> sandEail($users, $token);
        session()->flash('message','Rset Password link send your email id');
        return redirect()->back();

   }

   public function sandEail($users,$token){
     Mail::send(
         'admin.auth.forgot-mail',['users'=>$users,'token'=>$token],
         function($message) use ($users){
             $message->to($users->email);
             $message->subject("$users->name, reset your password");
         }
     );
   }

   // Rest password  Change Password

   public function getPassword($email, $token) { 
          return view('admin.auth.f-changepassword', ['token' => $token , 'email'=>$email]);
    }
    public function updaterestpassword(Request $request){

    $request->validate([
      'password' => 'required|string|min:6|confirmed',
      'password_confirmation' => 'required',

    ]);
   $updatePassword = DB::table('password_resets')
                      ->where(['email' => $request->email, 'token' => $request->token])
                      ->first();

   if(!$updatePassword){
      return back()->withInput()->with('error', 'Invalid token!');
    }else{

    $user = Admins::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email'=> $request->email])->delete();

    return redirect('/admin')->with('message', 'Your password has been changed!');
    }
}

     // Service Delete ==========================

     public function servicedetail(Request $request)
     {    
         $data = DB::table('services')->where('id',$request['id'])->first();
        // dd($data);
         return view('admin.service.detail',['data'=>$data]);
     }
     

    
     public function delete(Request $request)
     {    
         DB::table('services')->where('id',$request['id'])->delete();
         $notification = array(
            'message' => 'Service Delete Successfully',
            'alert-type' => 'success');
            return redirect()->back()->with($notification);
     }

     public function userdelete(Request $request)
     {    
         DB::table('users')->where('id',$request['id'])->delete();
         $notification = array(
            'message' => 'User Delete Successfully',
            'alert-type' => 'success');
            return redirect()->back()->with($notification);
     }


     


     public function approved($id)
    {
      
        $v_category = DB::table('services')
                ->select('status')
                ->where('id','=',$id)
                ->first();
    
        if($v_category->status == '1'){
        $status = '0';
        //update video categories status
        $values = array('status' => $status );
        DB::table('services')->where('id',$id)->update($values);
        $notification = array(
            'message' => 'Inactive successfully.',
            'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
        $status = '1';
        //update video categories status
        $values = array('status' => $status );
        DB::table('services')->where('id',$id)->update($values);
        $notification = array(
            'message' => 'Active successfull.',
            'alert-type' => 'success');
            return redirect()->back()->with($notification);
        
         }

    }

    public function userapproved($id)
    {
      
        $v_category = DB::table('users')
                ->select('status')
                ->where('id','=',$id)
                ->first();
    
        if($v_category->status == '1'){
        $status = '0';
        //update video categories status
        $values = array('status' => $status );
        DB::table('users')->where('id',$id)->update($values);
        $notification = array(
            'message' => 'Inactive successfully.',
            'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
        $status = '1';
        //update video categories status
        $values = array('status' => $status );
        DB::table('users')->where('id',$id)->update($values);
        $notification = array(
            'message' => 'Active successfull.',
            'alert-type' => 'success');
            return redirect()->back()->with($notification);
        
         }

    }

    public function service_list(Request $request){
        $data=DB::table('services')->where('user_id',$request['id'])->Paginate(10);
        //dd($data);
        return view('admin.service.service-list',['data'=>$data]);
      }
 


}
