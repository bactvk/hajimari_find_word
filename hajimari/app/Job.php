<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Job extends Model
{
    protected $table = 'jobs';

    public static function getListField()
    {
    	return DB::table('job_category')->get();
    }

    public static function getFieldChild($id)
    {
    	return self::where('category_id',$id)->get();
    }

    public static function search($inputs)
    {
    	$query = self::query();
    	$query->select('job_category.name','jobs.name','jobs.location','jobs.lang_id','jobs.salary_from','jobs.salary_to',
                DB::raw('job_category.name as job_category_name','area.name as area_name')
            )->leftJoin('job_category', function($join) {
                $join->on('job_category.id', '=', 'jobs.category_id');

            })->get();


      	if(!empty($inputs['nameJob'])){
      		$query->where('jobs.name','LIKE','%'.$inputs['nameJob'].'%');
        }

        if(!empty($inputs['workplace'])){
        	$query->whereIn('location',$inputs['workplace']);
        }

        if(!empty($inputs['field_parent'])){
        	$query->whereIn('category_id',$inputs['field_parent']);
        }

        if(!empty($inputs['salaryLevel'])){
        	$salary_level = $inputs['salaryLevel'];

        	
        	for($i=0; $i<count($salary_level);$i++){

        		static::SelectSalaryLevel($i,$salary_level,$query);
        		
        	}
        	
        }


        if(!empty($inputs['laguageLevel'])){
        	$query->whereIn('lang_id',$inputs['laguageLevel']);
        }

        $listJob = $query->get();

        return $listJob;
    }

    public static function SelectSalaryLevel($i,$salary_level,$query){
    	if($i==0){
			if($salary_level[$i]==1){
				$query->where('salary_to','<=',500);
			}
			else if($salary_level[$i]==2){
				$query->where('salary_from','>',500)->where('salary_to','<=',1000);
			}
			else if($salary_level[$i]==3){
				$query->where('salary_from','>',1000)->where('salary_to','<=',1500);
			}
			else if($salary_level[$i]==4){
				$query->where('salary_from','>',1500)->where('salary_to','<=',2000);
			}
			else if($salary_level[$i]==5){
				$query->where('salary_from','>',2000)->where('salary_to','<=',2500);
			}
			else if($salary_level[$i]==6){
				$query->where('salary_from','>',2500);
			}
        			
		}else{
			if($salary_level[$i]==1){
				$query->Orwhere('salary_from','<=',500);
			}
			else if($salary_level[$i]==2){
				$query->Orwhere('salary_from','>',500)->Orwhere('salary_to','<=',1000);
			}
			else if($salary_level[$i]==3){
				$query->Orwhere('salary_from','>',1000)->Orwhere('salary_to','<=',1500);
			}
			else if($salary_level[$i]==4){
				$query->Orwhere('salary_from','>',1500)->Orwhere('salary_to','<=',2000);
			}
			else if($salary_level[$i]==5){
				$query->Orwhere('salary_from','>',2000)->Orwhere('salary_to','<=',2500);
			}
			else if($salary_level[$i]==6){
				$query->Orwhere('salary_from','>',2500);
			}

			
		}

    }
}
