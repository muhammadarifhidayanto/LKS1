<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);
        $username = $request->username;
        $password = $request->password;

        $login = Admin::where(['username'=>$username,'password'=>$password])->first();

        $a = ['a','b','c'];

        if (count($login)==0) {
               return view('login',['a'=>$a]);   
        }else {
             $request->session()->put('user',$username);
            return redirect('admin/manage?id=');
        }

    }
    public function index(Request $request)
    {
    	
        $user = $request->session()->get('user');
        $find = Admin::get()->where('username',$user);

        $cari = $request->cari;

        if ($user == "") {
            return redirect('/login');
        }else{
            if (count($cari)==0) {
                $admin = Admin::get();
                return view('admin',['admin'=>$admin, 'find'=>$find]);
            }else{
                $aa = Admin::where('fullName','LIKE','%'.$cari.'%');
                return view('admin',['admin'=>$aa,'find'=>$find]);
            }
            
        }

    	
    }

    public function add(Request $request)
    {
    	$this->validate($request,[
    		'firstName' => 'required',
    		'lastName' => 'required',
    		'username' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'file' => 'required|file|image'
    	]);

    	$file = $request->file('file');

    	$fileName = time()."_".$file->getClientOriginalName();

    	$fileStorage = 'data_file';

    	$file->move($fileStorage,$fileName);

    	$fullName = $request->firstName . $request->lastName;

    	Admin::create([
    		'fullName' => $fullName,
    		'username' => $request->username,
    		'email' => $request->email,
    		'password' => $request->password,
    		'addBy' => 'admin',
    		'image' => $fileName
    	]);


    	return redirect()->back();
    }
    public function edit(Request $request)
    {
    	$this->validate($request,[
    		'id' => 'required',
    		'firstName' => 'required',
    		'lastName' => 'required',
    		'username' => 'required',
    		'email' => 'required',
    		'password' => 'required',
    		'file' => 'required|file|image'
    	]);

    	$file = $request->file('file');

    	$fileName = time()."_".$file->getClientOriginalName();

    	$fileStorage = 'data_file';

    	$file->move($fileStorage,$fileName);

    	$fullName = $request->firstName . $request->lastName;

    	$id = $request->id;
    	$admin = Admin::find($id);
    	$admin->fullName = $fullName;
    	$admin->username = $request->username;
    	$admin->email = $request->email;
    	$admin->password = $request->password;
    	$admin->image = $fileName;
    	$admin->save();
    	

    	return redirect()->back();
    }

    public function delete($id)
    {
    	$admin = Admin::find($id);
    	$admin->delete();

    	return redirect()->back();
    }
}
