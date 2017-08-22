<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectResult extends Model
{
	public function components(){
		return $this->belongsTo('App\ProjectComponent');
	}

	public function users(){
		return $this->belongsTo('App\User');
	} 
}
