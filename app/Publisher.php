<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //
    protected $table = 'publishers';
	protected $fillable = ['name','address','phone','email'];

	public function books()
    {
    	return $this->hasMany('App\Book');
    }
    
}
