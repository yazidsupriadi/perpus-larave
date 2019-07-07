<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $authors = Author::all();
        return view('admin.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $authors = Author::create($request->all());
        return redirect('/admin/author');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $authors = Author::find($id);
        return view('admin.author.edit',compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $authors = Author::find($id);
        $authors->name = $request->name;
        $authors->address = $request->address;
        $authors->phone = $request->phone;
        $authors->email = $request->email;
        $authors->update();
        return redirect('/admin/author');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $authors = Author::find($id);
        $authors->delete();
        return redirect('/admin/author');
    
    }


    public function search(Request $request)
    {

        $search = $request->get('search');
 
            // mengambil data dari table pegawai sesuai pencarian data
        $authors = Author::where('name','like',"%".$search."%")
        ->paginate();
 
            // mengirim data pegawai ke view index
        return view('admin.author.index',compact('authors'));
    }
}
