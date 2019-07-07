<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class CartController extends Controller
{
    //
    public function index($id)
    {
    	$books = Book::find($id);
    	Cart::add(['id' => $books->id,'name'=> $books->name,'qty'=>1,'code'=>$books->code]);
    	return Cart::content();
    }
}
