<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    //
    protected $table = 'shelfs';
    protected $fillable = ['code','position'];

    public function books()
    {
    	return $this->hasMany('App\Book');
    }
    
}
