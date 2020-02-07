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
    		'salaryLevel' 	 => $request->input('salaryLevel',[]),
    		'laguageLevel' 	 => $request->input('laguageLevel',[]),
            'field_search'   => $request->input('field_search',[])

    	];
    	
    	$data['listWorkplace'] = Area::list();
    	$data['listField'] = Job::getListField();
    	$data['listJob'] = Job::search($inputs);
        $data['listLanguage'] = Job::getListLanguage();

        $data['inputs'] =$inputs;

        

    	return view('find_job.list',$data);
    }  

    public function indexConditon(Request $request)
    {
    	$inputs = [
    		'nameJob'		 => $request->input('nameJob',''), 
    		'workplace' 	 => $request->input('workplace',[]),
    		'salaryLevel' 	 => $request->input('salaryLevel',[]),
    		'laguageLevel' 	 => $request->input('laguageLevel',[]),
            'field_search'   => $request->input('field_search',[])

    	];
    	$page = $request->input('page','');

    	$data['listJob'] = Job::search($inputs,$page);

    	return response()->json($data['listJob']);
    }

}
