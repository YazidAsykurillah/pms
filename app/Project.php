<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
    	'code', 'name', 'description', 'client_id', 'project_manager_id'
    ];



    public function client()
    {
    	return $this->belongsTo('App\Client', 'client_id');
    }


    public function project_manager()
    {
    	return $this->belongsTo('App\User', 'project_manager_id');
    }
}
