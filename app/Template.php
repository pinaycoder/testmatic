<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public $created_full_name = '';
    public $modified_full_name = '';
    public $duration;

    public $timestamps = false;

    private function getDuration(){

    	$components = TemplateComponent::select('time_limit')
    										->where('template_id', $this->id)
    										->where('type', 'Scenario')
    										->get();


    	foreach($components as $component){
    		$this->duration += $component->time_limit;
    	}

    }

    private function getCreatedByName(){

    	$created = User::find($template->created_by);

    	$this->created_full_name = $created->first_name . ' ' . $created->last_name;
    }

    private function getModifiedByName(){

    	$modified = User::find($template->modified_by);

    	$template->modified_full_name = $modified->first_name . ' ' . $modified->last_name;

    }
}
