<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;

class Brand extends Model
{
    //
    protected $guard_name = 'web';
    
    protected $table = 'brands';
    
   	protected $fillable = [
        'name','brandlogo','status'
   	];

   	public function getBrandlogoAttribute($value)
    {
        if(isset($value)){
            $imagepath = Config::get("app.appstoreurl").$value;
        }else{
            $imagepath =  asset("public/backend/default/profile.png");
        }
        return  $imagepath;
    }
}
