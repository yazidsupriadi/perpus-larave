<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Alert;
class CategoryController extends Controller
{
    //
    public function index()
    {
    	$categories = Category::where('parent_id',null)->get();
    	return view('admin.category.index',compact('categories'));
    }
    public function store(Request $request)
    {
    	$categories = Category::create($request->all());
        Alert::success('Data Category was added successfully', 'Thanks!');
    	return redirect('admin/category');
    }
    public function edit($id)
    {
    	$categories = Category::find($id);
    	$subcategories = Category::where('parent_id',null)->get();
    	return view('admin.category.edit',['categories'=> $categories,'subcategories'=>$subcategories]);
    
    }
    public function update(Request $request,$id)
    {
    	$categories = Category::find($id);
    	$categories->update($request->all());
        Alert::success('Data category was updated successfully', 'Thanks!');
        return redirect('/admin/category');
    
    }
    public function destroy($id)
    {
    	$categories = Category::find($id);
    	$categories->delete();
        Alert::success('Data category was deleted successfully', 'Thanks!');
     	return redirect('/admin/category');
    	
    }
}
