<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Publisher;
use App\Category;
use App\Shelf;
use Alert;
class BookController extends Controller
{
    //
    public function index()
    {	

    	$authors = Author::all();
    	$publishers = Publisher::all();
    	$categories = Category::where('parent_id',null)->get();
    	$shelfs = Shelf::all();
    	$books = Book::all();
    	return view('admin.books.index',compact('books','authors','publishers','categories','shelfs'));
    }
    public function destroy($id)
    {
    	$books = Book::find($id);
    	$books->delete();
        Alert::success('Data was deleted successfully', 'Thanks!');
    	return redirect('/admin/book');
    }

    public function store(Request $request)
    {	
    	$books = new Book;
    	$books->name = $request->name;
    	$books->code = $request->code;
    	$books->publication_year = $request->publication_year;
    	$books->pages = $request->pages;
    	$books->qty = $request->qty;
    	$books->description = $request->description;
    	$books->author_id = $request->author_id;
    	$books->publisher_id = $request->publisher_id;
    	$books->category_id = $request->category_id;
    	$books->shelf_id = $request->shelf_id;
    	if ($request->hasFile('picture')) {
          $request->file('picture')->move(public_path('admin/img/book/'),$request->file('picture')->getClientOriginalName());
          $books->picture = $request->file('picture')->getClientOriginalName();
            
            
        }
        $books->save();
        Alert::success('Data was added successfully', 'Thanks!');  
    	return redirect('admin/book');
    }
    public function edit($id)
    {
    	$books = Book::find($id);

    	$authors = Author::all();
    	$publishers = Publisher::all();
    	$categories = Category::where('parent_id',null)->get();
    	$shelfs = Shelf::all();

    	return view('admin.books.edit',compact('books','authors','publishers','categories','shelfs'));
    }
    public function update(Request $request,$id)
    {
	    $books = Book::find($id);
    	$books->name = $request->name;
    	$books->code = $request->code;
    	$books->publication_year = $request->publication_year;
    	$books->pages = $request->pages;
    	$books->qty = $request->qty;
    	$books->description = $request->description;
    	$books->author_id = $request->author_id;
    	$books->publisher_id = $request->publisher_id;
    	$books->category_id = $request->category_id;
    	$books->shelf_id = $request->shelf_id;
    	if ($request->hasFile('picture')) {
          $request->file('picture')->move(public_path('admin/img/book/'),$request->file('picture')->getClientOriginalName());
          $books->picture = $request->file('picture')->getClientOriginalName();
            
            
        }
    	$books->update();
        Alert::success('Data was updated successfully', 'Thanks!');  
    	return redirect('/admin/book');
    	
    		
    }


    public function search(Request $request)
    {

        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::where('parent_id',null)->get();
        $shelfs = Shelf::all();

        $search = $request->get('search');
 
            // mengambil data dari table pegawai sesuai pencarian data
        $books = Book::where('name','like',"%".$search."%")
        ->paginate();
 
            // mengirim data pegawai ke view index
        return view('admin.books.index',compact('authors','publishers','books','categories','shelfs'));
    }

}
