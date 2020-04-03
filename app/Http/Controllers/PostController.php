<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Post;

class PostController extends Controller
{
    public function home(Request $request)
    {
        $post = Post::get();

        return view('home',['post'=>$post]);
    }
    public function index(Request $request)
    {
    	$post = Post::get();
        $user = $request->session()->get('user');
        $find = Admin::get()->where('username',$user);

        if ($user == "") {
            return redirect('/login');
        }else{
           return view('post',['post'=>$post,'find'=>$find]); 
        }

    	
    }

    public function add(Request $request)
    {
    	$this->validate($request,[
    		'title' => 'required',
    		'category' => 'required',
    		'location' => 'required',
    		'photoBy' => 'required',
    		'description' => 'required',
    		'file' => 'required|file|image'
    	]);

    	$file = $request->file('file');

    	$fileName = time()."_".$file->getClientOriginalName();

    	$fileStorage = 'data_file';

    	$file->move($fileStorage,$fileName);


    	Post::create([
    		'title' => $request->title,
    		'category' => $request->category,
    		'location' => $request->location,
    		'photoBy' => $request->photoBy,
    		'description' => $request->description,
    		'image' => $fileName
    	]);


    	return redirect()->back();
    }
    
    public function edit(Request $request)
    {
    	$this->validate($request,[
    		'id' => 'required',
    		'title' => 'required',
    		'category' => 'required',
    		'location' => 'required',
    		'photoBy' => 'required',
    		'description' => 'required',
    		'file' => 'required|file|image'
    	]);

    	$file = $request->file('file');

    	$fileName = time()."_".$file->getClientOriginalName();

    	$fileStorage = 'data_file';

    	$file->move($fileStorage,$fileName);

    	$id = $request->id;

    	$post = Post::find($id);
    	$post->title = $request->title;
    	$post->category = $request->category;
    	$post->location = $request->location;
    	$post->photoBy = $request->photoBy;
    	$post->description = $request->description;
    	$post->image = $fileName;
    	$post->save();


    	return redirect()->back();
    }
    public function delete($id)
    {
    	$admin = Post::find($id);
    	$admin->delete();

    	return redirect()->back();
    }
}
