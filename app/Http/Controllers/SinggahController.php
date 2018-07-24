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
        // $singgah = Singgah::orderBy('created_at','desc')->get();
        // $singgahcomment = SinggahComment::all();

        $singgah = Singgah::with('singgahcomment','singgahlike')->withCount('singgahlike')->orderBy('singgahlike_count', 'desc')->get();
        // $singgah = Singgah::with('singgahcomment','singgahlike')->orderBy('singgahlike','singgah_id')->get();
        // $singgah = singgah::->paginate(10);
        // Order::with('company')->get()->sortBy('company.name');

       
        // $count = SinggahLikes::where('likes', 1)->where('singgah_id',1)->count();

        // return $count;
        // return $singgah;

        // return $singgahcomment;
        // if($request->ajax()) {
        //     return [
        //         'barengan' => view('load.loadBarengan')->with(compact('barengan','barengancomments'))->render(),
        //         'next_page' => $barengan->nextPageUrl()
        //         ];
        // }

        return view('singgah',compact('singgah'));
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
