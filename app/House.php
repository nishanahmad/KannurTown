<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = ['id'];
	
	public function members()
	{
		return $this->hasMany('App\Member')->get();
	}	
}
