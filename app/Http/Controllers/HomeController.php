<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\PostComment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $datapost = Post::all();
        return view('welcome',compact('datapost'));
        
    }
   
    public function store(Request $request)
    {
        
    }
  
    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

   
    public function destroy($id)
    {
        
    }
}
