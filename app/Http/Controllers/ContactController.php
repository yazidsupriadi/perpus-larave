<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Contact;
use Alert;
class ContactController extends Controller
{
    //
        protected $category;
    public function __construct()
    {
    	$this->category = Category::where('parent_id',null)->get();
	}

    public function index()
    {

    	$category = $this->category = Category::where('parent_id',null)->get();
    	return view('homepage.contact',compact('category'));
    }

      public function store(Request $request)
    {	
        $contacts = new Contact;
        $contacts->name = $request->name;
        $contacts->phone = $request->phone;
        $contacts->comment = $request->comment;
        $contacts->save();
        Alert::success('Your contact was successfully', 'Happy Read!');
        return redirect('/contact');   
    } 

}
