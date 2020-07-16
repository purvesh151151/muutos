<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    protected $guard_name = 'web';
    
    protected $table = 'roles';
    
   	protected $fillable = [
        'name', 'guard_name'
   	];
}


