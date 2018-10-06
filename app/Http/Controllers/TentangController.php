<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Input;
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
            $filename = 'avatars/'.str_slug($request->user()->email, '') . '.' . $request->avatar->getClientOriginalExtension();

            $pathfoto = Image::make($request->file('avatar'))->resize(200,200)->save(storage_path('/app/public/') . $filename);

            // return $pathfoto;

            $request->user()->update([
                'avatar' => $filename
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
