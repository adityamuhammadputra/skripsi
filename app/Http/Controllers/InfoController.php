<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Info;
use App\User;
use Session;
use View;


class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Info::with('infocomment','infolike','likecek')
        ->withCount('infolike')
        ->orderBy('infolike_count', 'desc')
        ->filtered()
        ->get();
        

        $datasaya = Info::where('user_id',auth()->id())->get();

        // return $datasaya;

        return view('info',compact('data','datasaya'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        
        $input['images'] = null;
        $input['user_id'] = auth()->id();

        if ($request->hasFile('images')){
            $input['images'] = '/upload/photo/'.str_slug($input['title'],'-').'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('/upload/photo/'), $input['images']);
        }

        Info::create($input);

        Session::flash('success', 'Kiriman Ditambah');
        return View::make('layouts/partials/_alertajax');
    }

  
    public function show($id)
    {
        $d = Info::find($id);

        $datasaya = Info::where('user_id',auth()->id())->get();

        return view('info-detail',compact('d','datasaya'));
    }

   
    public function edit($id)
    {   
        $data = Info::find($id);
        return $data;
    }   

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $info = Info::findOrFail($id);

        $input['images'] = $info->images;

        if($request->hasFile('images'))
        {
            if($info->images != null)
            {
                unlink(public_path($info->images));
            }

            $input['images'] = '/upload/photo/'.str_slug($input['title'],'-').'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('/upload/photo/'), $input['images']);
        }
        $info->update($input);

        Session::flash('info', 'Kiriman Diperbaharui');
        return View::make('layouts/partials/_alertajax');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = Info::findOrFail($id);

        // return $info->images;

        if($info->images != null)
        {
            unlink(public_path($info->images));
        }

        Info::destroy($id);

        Session::flash('error', 'Kiriman Dihapus');
        return View::make('layouts/partials/_alertajax');
    }
}
