<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publisher;
class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $publishers = Publisher::all();
        return view('admin.publisher.index',compact('publishers'));
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
        $publishers = Publisher::create($request->all());
        return redirect('/admin/publisher');

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
        $publishers = Publisher::find($id);
        return view('admin.publisher.edit',compact('publishers'));
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
        $publishers = Publisher::find($id);
        $publishers->name = $request->name;
        $publishers->address = $request->address;
        $publishers->phone = $request->phone;
        $publishers->email = $request->email;
        $publishers->update();
        return redirect('/admin/publisher');

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
        $publishers = Publisher::find($id);
        $publishers->delete();
        return redirect('admin/publisher');
    }


    public function search(Request $request)
    {

        $search = $request->get('search');
 
            // mengambil data dari table pegawai sesuai pencarian data
        $publishers = Publisher::where('name','like',"%".$search."%")
        ->paginate();
 
            // mengirim data pegawai ke view index
        return view('admin.publisher.index',compact('publishers'));
    }

}
