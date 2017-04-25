<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public $created_full_name = '';
    public $modified_full_name = '';
    public $components = null;
}
