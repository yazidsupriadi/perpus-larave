<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use Auth;
use App\User;
use App\Loaning;
use Alert;
class CartController extends Controller
{
    //

    protected $category;
    public function __construct()
    {
    	$this->category = Category::where('parent_id',null)->get();
	}

    public function formulir($id)
    {
    		$books = Book::where('id',$id)->first();  
    	$users = User::all();
    	$category = $this->category;
    	return view('homepage.formulir',compact('category','users','books'));
    }

      public function cartstore(Request $request)
    {
    	$books = Book::all();	
        $loanings = new Loaning;
        $loanings->code = $request->code;
        $loanings->loaning_date = $request->loaning_date;
        $loanings->returning_date = $request->returning_date;
        $loanings->description = $request->description;
        $loanings->qty = $request->qty;
        $loanings->user_id = Auth::user()->id;
        $loanings->book_id = $request->book_id;
        $loanings->save();
        Alert::success('Your loaning was successfully', 'Happy Read!');
        return redirect('admin/loaning');   
    } 

    public function myloaning()
     { 
    	$category = $this->category;
    	$loanings = Loaning::orderBy('id','DESC')->where('user_id',Auth::user()->id)->get();
    	return view('homepage.myloaning',compact('category','loanings'));

     } 
}
