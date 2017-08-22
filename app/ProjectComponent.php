<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectComponent extends Model
{
    public $timestamps = false;
    public $created_full_name = '';
    public $modified_full_name = '';

    public function results(){
        return $this->hasMany('App\ProjectResult');
    }
}
