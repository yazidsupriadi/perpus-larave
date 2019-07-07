<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Alert;
class UserController extends Controller
{
    //
    public function index()
    {
    	$users = User::all();
    	return view('admin.user.index',compact('users'));
    }

    public function changestatus($id)
    {
        $user = User::find($id);
        if($user->status == '0'){
            $change_status = '1';
        }else {
            $change_status = '0';
        }

        User::where('id',$id)->update(['status' => $change_status]);
     
        return redirect('admin/user');
    }

     public function adduser()
    {
        return view('admin.user.add');
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
        return redirect('admin/user');
    
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit',['user' => $user]);
    }

     public function update(Request $data)
    {
        $img = '';
        if ($file = $data->file('file')) {
            $filename = $file->getClientOriginalName();
            $data->file('file')->move(public_path('admin/img/user'),$filename);
            $img = 'admin/img/user'.$filename;
        }
        $ubahdata = ([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'gender' => $data['gender'],
            'role' => $data['role'],
            'photo' => $img,
            'password' => bcrypt($data['password']),
        ]);
        User::where('id',$data->id)->update($ubahdata);
      
        return redirect('admin/user');   
    }
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        Alert::success('Data was deleted successfully', 'Thanks!');
        return redirect('admin/user');
    }

}
