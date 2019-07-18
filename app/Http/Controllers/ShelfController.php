<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shelf;
use Alert;
class ShelfController extends Controller
{
    //
    public function index()
    {
    	 $shelfs = Shelf::all();
		 return view('admin.shelf.index',compact('shelfs'));
	
    }
    public function store(Request $request){

    	$shelfs = Shelf::create($request->all());
        Alert::success('Data Shelf was added successfully', 'Thanks!');
    	return redirect('admin/shelf');
    }
    public function destroy($id)
    {
        $shelfs = Shelf::find($id);
        $shelfs->delete();        
        Alert::success('Data Shelf was deleted successfully', 'Thanks!');
        return redirect('admin/shelf');
        
    }
    public function edit($id)
    {
        $shelfs = Shelf::find($id);
        return view('admin.shelf.edit',compact('shelfs'));
    }

    public function update(Request $request,$id)
    {
        $shelfs = Shelf::find($id);
        $shelfs->code = $request->code;
        $shelfs->position = $request->position;
        $shelfs->update();
        Alert::success('Data Shelf was updated successfully', 'Thanks!');
        return redirect('/admin/shelf');
    }
}
