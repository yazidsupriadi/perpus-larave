<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaning extends Model
{
    //
    protected $table = 'loanings';

    protected $fillable = ['code','loanign_date','returning_date','description','fine','qty','user_id','book_id'];

    public function book()
    {
    	return $this->belongsTo('App\Book');

    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
