<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\PostComment;
use Illuminate\Support\Facades\Auth;
use Session;
use View;

class HomeController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datapost = Post::orderBy('created_at','desc')->get();
        $comments = PostComment::latest()->paginate(1);

        // $datapost = Post::latest()->paginate(10);

        return view('welcome',compact('datapost','comments'));
        
    }
   
    public function store(Request $request)
    {
        $data = [
            'user_id' =>auth()->id(),
            'content' => $request['content']
        ];

        Post::create($data);

        Session::flash('success', 'Kiriman Ditambah');
        return View::make('layouts/partials/_alertajax');
    }
  
    public function edit($id)
    {
        $data = Post::find($id);
        return $data;
    }

    public function update(Request $request, $id)
    {
        $data = Post::find($id);
        $data->content = $request['content'];
        $data->update();

        Session::flash('info', 'Kiriman Rubah');
        return View::make('layouts/partials/_alertajax');
    }

   
    public function destroy($id)
    {
        Post::destroy($id);

        Session::flash('error', 'Kiriman Dihapus');
        return View::make('layouts/partials/_alertajax');
    }
}
