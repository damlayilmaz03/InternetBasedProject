<?php

namespace App\Http\Controllers\AdminPanel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\House;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Setting;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pid)
    {
        $house= House::find($pid);
        //$images= Image::where('house_id',$pid);
        $images= DB::table('images')->where('house_id',$pid)->get();
        return view('admin.image.index',[
            'house'=> $house,
            'images'=> $images
        ]);
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$pid)
    {
        $data= new Image();
        $data->house_id= $pid;
        $data->title = $request->title;
        if ($request->hasFile('image')){
           
            $file= $request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('storage/img/',$filename);
            $data->image= $filename;
        }
        $data->save();

        return redirect()->route('admin.image.index',['pid'=>$pid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$pid, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid,$id)
    {
        $data=Image::find($id);
        $destination= 'storage/img/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect()->route('admin.image.index',['pid'=>$pid]);
    }
}
