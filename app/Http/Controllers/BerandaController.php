<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Book;
use Auth;
use Alert;
class BerandaController extends Controller
{
    //
    protected $category;
    public function __construct()
    {
    	$this->category = Category::where('parent_id',null)->get();
	}
    public function index()
    {
    	 $category = $this->category;
    	return view('homepage.layout.index',compact('category'));
    }
    public function allbook()
    {
    	$category = $this->category;
    	$books = Book::orderBy('id','DESC')->get();
    	return view('homepage.allbook',compact('books','category'));
    }
    public function bookbycategory($name)
    {	
    	$categories = Category::where('name',$name)->first();
    	$id = $categories->id;
    	$category = $this->category;
    	$name = $categories->name;
    	$books = Book::orderBy('id','DESC')->where('category_id',$id)->get();

		return view('homepage.bookbycategory',compact('books','category','name'));
     	
    }

    public function detail($id)
    {
    	$category = $this->category;
    	$books = Book::where('id',$id)->first();
    	return view('homepage.detailku',compact('books','category'));

    }

    public function logout()
    {
    	Auth::logout();
        Alert::success('You was logged out successfully', 'Thanks!');
    	return redirect('/');
    }
}
