<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modified_date';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

    protected $created_full_name = '';
    protected $modified_full_name = '';

    public function __construct(){

        $this->setCreatedByName();
        $this->setModifiedByName();

    }

    private function setCreatedByName(){

        $this->created_full_name = $this->first_name . ' ' . $this->last_name;
    }

    private function setModifiedByName(){

        $this->modified_full_name = $this->first_name . ' ' . $this->last_name;
    }

    public function projects()
    {
        return $this->belongsToMany('App\Project');
    }

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    public function results(){
        return $this->hasMany('App\ProjectResult');
    }

    public function assignRole($role){

        $this->roles()->save(
            Role::whereName($role)->first()
        );
    }

    public function hasRole($role){

        if(is_string($role)){
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function isAdmin(){

        return ($this->$role == 'Super Administrator' || $this->role == 'Test Administrator');
    }

    
}
