<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
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
        return redirect('/admin/category');
    
    }
    public function destroy($id)
    {
    	$categories = Category::find($id);
    	$categories->delete();
     	return redirect('/admin/category');
    	
    }
}
