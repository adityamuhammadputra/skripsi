<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;

class TentangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('tentang.tentang');
    }


    public function update(Request $request)
    {
       

        if ($request->file('avatar')) {
            if ($request->user()->avatar) {
                Storage::delete($request->user()->avatar);		//menghapus file yang diupdate diganti yang baru
            }
            $pathfoto = $request->file('avatar')->store('avatars');

            $request->user()->update([
                'avatar' => $pathfoto
            ]);

        } else {
            $request->user()->update([
                'name' => request('name'),
                'pekerjaan' => request('pekerjaan'),
                'agama' => request('agama'),
                'hobby' => request('hobby'),
                'bio' => request('bio'),
                'contact' => request('contact'),
                'alamat' => request('alamat')
            ]);
        }

        
        return redirect()->back()->withInfo('Data anda berhasil di perbaharui ');
    }

    public function edit(Post $id)
    {
        $datakategori = Category::all();

        return view('post.edit', compact('id', 'datakategori'));
    }

    public function getUserImage($filename)
    {
        $myFile = Storage::disk('public')->get($filename);

        return view('layouts.master', compact('myFile'));
    }
}
