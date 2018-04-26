<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\User;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;

class UserRegistration extends Controller {
    
    public function signup(Request $request) {        
            $validator = Validator::make($request->all(), [
                'username' => 'required',
                'role' => 'required',
                'useremail' => 'required|email',
            ]);

        if ($validator->fails()) {
            return redirect('admin/post')->withErrors($validator)->withInput();
        } else {
                $data = array(
                    "name" => $request->username,
                    "email" => $request->useremail,
                    "password" => Hash::make($request->password),
                    "remember_token" => $request->_token,
                    "role"=>$request->role,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s')
                );
                
                $is_email = DB::table('users')->select('email')->where('email', $request->useremail)->get();  
                
                if(count($is_email) == 0) {
                    if (DB::table('users')->insert($data)) {
                        return redirect('admin/userlist')->with('success', 'SuccessFully Registered.');
                    } else {
                        return redirect('admin/post')->with('failure', 'Failure inserted.');
                    }
                } else {
                        return redirect('admin/post')->with('error', 'Email already exist..');
                }
        }
    }

    public function getdata() {
        if(Auth::check()){
            $users = DB::table('users')->paginate(2);
            $users->setPath('');
            return view('admin/userlist')->with('users',$users);
        }else{
            return redirect('/admin');
        }
    }
    
    public function edituserlist($id){
          $editusers = DB::table('users')->where('id', $id)->get();
          return view('admin/vieweditdata',['editusers'=>$editusers]);
    }
    
    public function updatedata(Request $request){
         $uname     = $request->username;
         $hiddenid  = $request->hiddenid;  
         $userrole  = $request->userrole;
         $update    = DB::table('users')
                   ->where('id',$hiddenid)
                   ->update(array('name'=>$uname,'role'=>$userrole));
         return redirect('admin/userlist')->with('sucessfullyupdate', 'Record update sucessfully..');
    }
    
    public function userdelete($id){
            $del = User::find($id);           
            $del->delete(); 
            return redirect('admin/userlist')->with('success', 'User has been deleted!!');
    }
    
    
    
}