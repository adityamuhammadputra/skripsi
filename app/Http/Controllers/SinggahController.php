<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Singgah;
use App\SinggahComment;
use App\User;
use Illuminate\Support\Facades\DB;

class SinggahController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $singgah = Singgah::all(); 
        $singgahcomment = SinggahComment::all();

        // return $singgahcomment;
        // if($request->ajax()) {
        //     return [
        //         'barengan' => view('load.loadBarengan')->with(compact('barengan','barengancomments'))->render(),
        //         'next_page' => $barengan->nextPageUrl()
        //         ];
        // }

        return view('singgah',compact('singgah','singgahcomment'));
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

        return Singgah::create($data);
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

        return $singgah;
    }

   
    public function destroy($id)
    {
        Singgah::destroy($id);
    }
}
