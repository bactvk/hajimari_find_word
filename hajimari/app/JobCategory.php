<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
	protected $table = 'job_category';

    public function getListField()
    {
    	return $this->select('jc2.id','jc2.name','jc2.parent_id')->from('job_category as jc1')
    	->leftJoin('job_category as jc2',function($join){
    		$join->on('jc1.id','jc2.id')->orOn('jc1.id','jc2.parent_id');
    	})->where('jc1.parent_id',0)->orderBy('jc1.id')->orderBy('jc2.id')->get();

    }
}
