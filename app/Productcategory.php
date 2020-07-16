<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;


class Productcategory extends Model
{
    
    protected $guard_name = 'web';
    
    protected $table = 'productcategorys';
    
   	protected $fillable = [
        'name', 'description','categoryimage','status'
   	];

   	public function getCategoryimageAttribute($value)
    {
        if(isset($value)){
            $imagepath = Config::get("app.appstoreurl").$value;
        }else{
            $imagepath =  asset("public/backend/default/profile.png");
        }
        return  $imagepath;
    }
}


