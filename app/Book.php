<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $tables = 'books';
    protected $fillable =['code','name','publication_year','pages','description','qty','author_id','publisher_id','category_id','shelf_id'];

    public function author()
    {
    	return $this->belongsTo('App\Author');
    }

 	public function publisher()
    {
        return $this->belongsTo('App\Publisher');

    }
    public function shelf()
    {
    	return $this->belongsTo('App\Shelf');
    }
        public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function loanings()
    {
        return $this->hasMany('App\Loaning');
    }
    

       
}
