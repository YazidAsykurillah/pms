<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = [
    	'code', 'name', 'label'
    ];

    public function permissions(){

    	return $this->belongsToMany('App\Permission');
    }
}
