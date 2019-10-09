<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Singgah;
use App\SinggahComment;
use App\SinggahLikes;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
use View;

class SinggahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {      
        $singgah = Singgah::with('singgahcomment','singgahlike','likecek')
        ->withCount('singgahlike')
        ->filtered()
        ->get()
        ->sortByDesc('rekomendasi');

        $singgahsaya = Singgah::with('singgahcomment', 'singgahlike', 'likecek')
            ->withCount('singgahlike')
            ->orderBy('singgahlike_count', 'desc')
            ->where('user_id',auth()->id())
            ->get();
        
        return view('singgah',compact('singgah', 'singgahsaya'));
    }

    public function store(Request $request)
    {
        $data = [
            'user_id' =>auth()->id(),
            'category' => $request['category'],
            'lokasi' => $request['lokasi'],
            'contact' => $request['contact'],
            'content' => $request['content'],
        ];

        Singgah::create($data);
        
        Session::flash('success', 'Kiriman Ditambah');
        return View::make('layouts/partials/_alertajax');
    }

    public function edit($id)
    {
        $singgah = Singgah::find($id);

        return $singgah;
    }

    public function show($id)
    {
        $d = Singgah::find($id);

        // $datasaya = Singgah::where('user_id', auth()->id())->get();
        $datasaya = Singgah::with('singgahcomment', 'singgahlike', 'likecek')
            ->withCount('singgahlike')
            ->orderBy('singgahlike_count', 'desc')
            ->where('user_id', auth()->id())
            ->get();

        return view('singgah-detail', compact('d', 'datasaya'));
    }
   
    public function update(Request $request, $id)
    {
        $singgah = singgah::find($id);
        $singgah->category = $request['category'];
        $singgah->lokasi = $request['lokasi'];
        $singgah->contact = $request['contact'];
        $singgah->content = $request['content'];
        $singgah->update();

        Session::flash('info', 'Kiriman Rubah');
        return View::make('layouts/partials/_alertajax');
    }

   
    public function destroy($id)
    {
        Singgah::destroy($id);

        Session::flash('error', 'Kiriman Dihapus');
        return View::make('layouts/partials/_alertajax');
    }
}
