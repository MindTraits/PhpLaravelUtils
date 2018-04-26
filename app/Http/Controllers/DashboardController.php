<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller {

    public function index(){
        if(Auth::check()){
            return view('admin.dashboard'); 
        }else{
            return redirect('/admin');
        }
    }
    
     public function post(){
           return view('admin.post'); 
    }
    
}
