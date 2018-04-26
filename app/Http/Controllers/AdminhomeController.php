<?php 
namespace App\Http\Controllers;
use Validator;
use DB;
use Hash;
use Auth;
//use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminhomeController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            return view('admin/login');
	}

        public function dologin(Request $request){            
           $user = array("email"=>$request->useremailid, "password"=>$request->password);           
            if(Auth::attempt($user)) {
                return redirect()->intended('admin/dashboard');                
            }else{
                return redirect()->intended('admin/login')->with('rediectionerror','Provide valid email and password.');
            }               
        }

        public function logout(){
            Auth::logout();
            return redirect()->intended('admin/');
        }

        
        /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
