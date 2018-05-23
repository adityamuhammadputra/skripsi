<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\PostComment;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $datapost = Post::latest()->paginate(5);
        $comments = PostComment::latest()->paginate(5);
        if($request->ajax()) {
            return [
                'datapost' => view('load.welcome')->with(compact('datapost','comments'))->render(),
                'next_page' => $datapost->nextPageUrl()
                ];
        }
        return view('welcome',compact('datapost', 'comments'));
    }

    public function store()
    {
        $this->validate(
            request(),
            [
                'content' => 'required | min:15',
            ]
        );

        Post::create([
            'user_id' => auth()->id(),
            'content' => request('content')
        ]);

        return redirect()->back()->withInfo('Data berhasil ditambah ');

    }

    public function destroy(Post $id)
    {
        $id->delete();

        return redirect()->back()->withDanger('Data berhasil dihapus');
    }

}
