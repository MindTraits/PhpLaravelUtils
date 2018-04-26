<?php
namespace App\Http\Controllers;
use App\Http\Requests;

use App\Course_category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use DB;
use Auth;

class CourseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
               if(Auth::check()){
                   $coursecategory = DB::table('course_category')->paginate(1); 
                   $coursecategory->setPath('');
                   return view('admin/coursecategorylist')->with('coursecategory',$coursecategory);
               }else{
                   return redirect('/admin');
               }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
        
	public function create()
	{
            if(Auth::check()){
                return view('admin/addcoursecategory'); 
            }else{
                return redirect('/admin');
            }           
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        
	public function store(Request $request)
	{          
            $validator = Validator::make($request->all(), [
                'categoryname' => 'required',
            ]);
           
            if ($validator->fails()) {
                return redirect('admin/addcoursecategory')->withErrors($validator)->withInput();
            } else {
                $data = array(
                    "title" => $request->categoryname,
                    "description" => $request->coursedesc,
                    "status"=>1,
                    "timecreate" => date('Y-m-d H:i:s'),
                    "timemodify" => date('Y-m-d H:i:s')
                );           
                if(DB::table('course_category')->insert($data)) {
                    return redirect('admin/coursecategorylist')->with('success', 'SuccessFully add course catergory.');
                } else {
                    return redirect('admin/coursecategorylist')->with('failure', 'Failure inserted.');
                }
            }
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
	public function destroy($id){            
                $nerd = Course_category::find($id); 
		$nerd->delete(); 
                return redirect('admin/coursecategorylist')->with('success', 'Course has been deleted!!');
                
	}

}
