<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;
use App\Job;

class JobController extends Controller
{
    public function index(Request $request)
    {
    	$inputs = [
    		'nameJob'		 => $request->input('nameJob',''), 
    		'workplace' 	 => $request->input('workplace',[]),
    		'field_parent' 	 => $request->input('field_parent',[]),   // category
    		'field_child' 	 => $request->input('field_child',[]),
    		'salaryLevel' 	 => $request->input('salaryLevel',[]),
    		'laguageLevel' 	 => $request->input('laguageLevel',[]),

    	];

    	$data['listWorkplace'] = Area::list();
    	$data['listField'] = Job::getListField();
    	$data['listJob'] = Job::search($inputs);


    	return view('find_job.list',$data);
    }

}
