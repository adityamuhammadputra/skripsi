<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Info;
use App\InfoComment;
use App\User;

class InfoController extends Controller
{
    public function index()
    {
        $info = Info::all(); 
        $infocomments = InfoComment::all();
        return view('info',compact('info','infocomments'));

    }
   
    public function store(Request $request)
    {
        $input = $request->all();
        
        $input['images'] = null;
        $input['user_id'] = auth()->id();

        if ($request->hasFile('images')){
            $input['images'] = '/upload/photo/'.str_slug($input['title'],'-').'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('/upload/photo/'),$input['images']);
        }

        Info::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Contact Created'
        ]);
    }

    public function show($id)
    {
        //
    }
   
    public function edit($id)
    {
        $data = Info::find($id);

        return $data;
    }

   
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $info = Info::findOrFail($id);

        $data['images'] = $info->images;

        if($request->hasFile('images')){
            if($info->photo != null)
            {
                unlink(public_path($info->images));
            }

            $data['images'] = '/upload/photo/'.str_slug($data['title'],'-').'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('/upload/photo/'), $data['images']);

        }
        $info->update($data);

        return response()->json([
            'success'=>true,
            'message' => 'Contact Updated'
        ]);
    }


    public function destroy($id)
    {
        $info = Info::findOrFail($id);

        if($info->images != null)
        {
            unlink(public_path($info->images));
        }

        Contact::destroy($id);

         return response()->json([
            'success'=>true,
            'message' => 'Contact Deleted'
        ]);
    }
}
