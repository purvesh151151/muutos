<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Config;
use Illuminate\Support\Str;

class Product extends Model
{
    //
    protected $table = 'products';
    
   	protected $fillable = [
        'name','slug','details','price','description','status'
   	];

   	public function setSlugAttribute($value) {

	    if (static::whereSlug($slug = Str::slug($value, '-'))->exists()) {

	        $slug = $this->incrementSlug($slug);
	    }

	    $this->attributes['slug'] = $slug;
	}

	public function incrementSlug($slug) {

	    $original = $slug;

	    $count = 2;

	    while (static::whereSlug($slug)->exists()) {

	        $slug = "{$original}-" . $count++;
	    }

	    return $slug;

	}


	public function brand()
    {
        return $this->belongsTo('App\Brand','brand_id','id');
    }


    public function getProductimageAttribute($value)
    {
        if(isset($value)){
            $imagepath = Config::get("app.appstoreurl").$value;
        }else{
            $imagepath =  asset("public/backend/default/profile.png");
        }
        return  $imagepath;
    }
   	
}
