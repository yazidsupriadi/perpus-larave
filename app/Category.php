<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';
    protected $fillable = ['name','parent_id'];

    function children()
    {
    	return $this->hasMany('app\Category','parent_id','id');
    }
    
    function parent(){
    	return $this->belongsTo('app\Category','parent_id','id');
    }
    public function books()
    {
        return $this->hasMany('App\Book');
    }
}
