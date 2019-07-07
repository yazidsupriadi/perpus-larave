<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
class AuthController extends Controller
{
    //

    protected $category;
    public function __construct()
    {
    	$this->category = Category::where('parent_id',null)->get();
	}
    public function register()
    {
    	 $category = $this->category;
    	return view('homepage.register',compact('category'));
    }
      public function store(Request $data)
    {
        $tambahdata = ([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);
        User::create($tambahdata);
        return redirect('/');
    
    }
    public function login(Request $request)
    {
    	
    	if(Auth::attempt($request->only('email','password'))){
    		return redirect('/');
    	}
    	return redirect('/login');
    }

}
