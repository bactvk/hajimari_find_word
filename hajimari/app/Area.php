<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Area extends Model
{
    protected $table = 'area';

    public static function list()
    {
    	return self::get();
    }

    public static function convertValue($inputs)
    {
    	$result_str = [
    		'nameJob' 		=> $inputs['nameJob'],
    		'workplace' 	=> '',
    		'field' 		=> '', 
    		'salaryLevel' 	=> '',
    		'laguageLevel' 	=> ''
    	];

        if(!empty($inputs['workplace'])){  
            $result = self::whereIn('id',$inputs['workplace'])->distinct()->pluck('name')->toArray();
            $result_str['workplace'] = implode(',',$result);
        }

        if(!empty($inputs['field_parent']) || !empty($inputs['field_child']) ){ 

        	$result_str['field'] = '';
        	$result_field_parent = [];
        	$result_field_child  = [];

        	if(!empty($inputs['field_parent'])){
        		$result_field_parent = DB::table('job_category')->whereIn('id',$inputs['field_parent'])->distinct()->pluck('name')->toArray();
        	}

        	if(!empty($inputs['field_child'])){
				$result_field_child = Job::whereIn('id',$inputs['field_child'])->pluck('name')->toArray();

        	}
            $result = array_merge($result_field_parent,$result_field_child);

            $result_str['field'] = implode(',',$result);

    
        }


        if(!empty($inputs['salaryLevel'])){  

        	$result_str['salaryLevel'] = '';
            for($i=0 ; $i<count($inputs['salaryLevel']); $i++){
            	if($inputs['salaryLevel'][$i] == 1){
            		$result_str['salaryLevel'].='< 500$,';
            	}
            	else if($inputs['salaryLevel'][$i] == 2){
            		$result_str['salaryLevel'].='500 - 1000$,';
            	}
            	else if($inputs['salaryLevel'][$i] == 3){
            		$result_str['salaryLevel'].='1001$ - 1500$,';
            	}
            	else if($inputs['salaryLevel'][$i] == 4){
            		$result_str['salaryLevel'].='1501$ - 2000$,';
            	}
            	else if($inputs['salaryLevel'][$i] == 5){
            		$result_str['salaryLevel'].='2001$ - 2500$,';
            	}
            	else if($inputs['salaryLevel'][$i] == 6){
            		$result_str['salaryLevel'].='>2500$,';
            	}
            }

            $result_str['salaryLevel'] = rtrim ($result_str['salaryLevel'] , ",");;
        }



        if(!empty($inputs['laguageLevel'])){  
            $result = Job::whereIn('lang_id',$inputs['laguageLevel'])->distinct()->pluck('lang_id')->toArray();
            $result_add_N = collect($result)->map(function($item){
            	return "N".$item;
            });

            $result_str['laguageLevel'] = implode(',',$result_add_N->toArray());

        }

        return $result_str;
    
    }
}
