<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = [
    	'name', 'address', 'primary_contact_name', 'primary_contact_number'
    ];
}
