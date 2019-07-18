<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaning;
use App\User;
use App\Book;
use Alert;
class LoaningController extends Controller
{
    //

    public function index()
    {
    	$loanings = Loaning::all();
    	$books = Book::all();
    	$users = User::all();
        Alert::success('Data Loaning was added successfully', 'Thanks!');
    	return view('admin.loaning.index',compact('loanings','books','users'));

    }
    public function destroy($id)
    {
    	$loanings = Loaning::find($id);
    	$loanings->delete();
        Alert::success('Data Loaning was deleted successfully', 'Thanks!');
    	return redirect('admin/loaning');
    }

    public function store(Request $request)
    {
        $loanings = new Loaning;
        $loanings->code = $request->code;
        $loanings->loaning_date = $request->loaning_date;
        $loanings->returning_date = $request->returning_date;
        $loanings->description = $request->description;
        $loanings->qty = $request->qty;
        $loanings->user_id = $request->user_id;
        $loanings->book_id = $request->book_id;
        $loanings->save();
        Alert::success('Data Loaning was updated successfully', 'Thanks!');
        return redirect('admin/loaning');   
    }   

    public function edit($id)
    {
        $loanings = Loaning::find($id);
        $books = Book::all();
        $users = User::all();
        return view('admin.loaning.edit',compact('loanings','books','users'));

    }

    public function update(Request $request,$id)
    {
        $loanings = Loaning::find($id);
        $loanings->code = $request->code;
        $loanings->loaning_date = $request->loaning_date;
        $loanings->returning_date = $request->returning_date;
        $loanings->description = $request->description;
        $loanings->qty = $request->qty;
        $loanings->fine = $request->fine;
        $loanings->user_id = $request->user_id;
        $loanings->book_id = $request->book_id;
        $loanings->update();
        Alert::success('Data Loaning was updated successfully', 'Thanks!');
        return redirect('admin/loaning');   
    }


    public function changestatus($id)
    {
        $loanings = Loaning::find($id);
        if($loanings->returning_status == 'on_loaning'){
            $change_status = 'on_time';
        }elseif ($loanings->returning_status == 'on_time') {
            $change_status = 'late';
        }
        else {
            $change_status = 'on_loaning';
        }

        Loaning::where('id',$id)->update(['returning_status' => $change_status]);
        Alert::success('Loaning status was chenged successfully', 'Thanks!');
        return redirect('admin/loaning');
    }
    public function search(Request $request)
    {

        $books = Book::all();
        $users = User::all();
        $search = $request->get('search');
 
            // mengambil data dari table pegawai sesuai pencarian data
        $loanings = Loaning::where('code','like',"%".$search."%")
        ->paginate();
 
            // mengirim data pegawai ke view index
        return view('admin.loaning.index',compact('loanings','users','books'));
    }

}
