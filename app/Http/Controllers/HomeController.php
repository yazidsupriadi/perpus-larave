<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Loaning;
use App\Author;
use App\Publisher;
use App\Category;
use App\Book;
use App\Shelf;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
        $books = Book::all();
        $shelfs = Shelf::all();
        $loanings = Loaning::all();
        return view('admin.layout.dashboard',compact('users','authors','publishers','categories','books','shelfs','loanings'));
    }
}
