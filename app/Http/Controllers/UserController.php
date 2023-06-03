<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Category;
use App\Models\UserHouse;
use App\Models\House;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=Setting::first();
        return view('home.user.index',[
            'setting'=>$setting,

    ]);
    }

    public function reviews()
    {
        $comments=Comment::where('user_id','=',Auth::id())->get();
        $setting=Setting::first();
        return view('home.user.comments',[
            'comments'=>$comments,
            'setting'=>$setting,
        ]);
    }


    public function myhouses()
    {
        $house1= UserHouse::where('user_id','=',Auth::id())->get();
        $house= House::where('user_id','=',Auth::id())->get();
        $setting=Setting::first();
        return view('home.user.myhouses',[
            'house1'=>$house1,
            'house'=>$house,
            'setting'=>$setting,
        ]);
    }

    public function addhouse(){

        $setting=Setting::first();
        $category = Category::all();
        return view('home.addhouse',[
            'setting'=>$setting,
            'category'=>$category
        ]);
    }

    public function edithouse(House $house,$id){

        $data=House::find($id);
        $setting=Setting::first();
        $category = Category::all();
        return view('home.edithouse',[
            'data'=>$data,
            'setting'=>$setting,
            'category'=>$category
        ]);
    } 

    public function edithouse1(UserHouse $userhouse,$id){

        $data=UserHouse::find($id);
        $setting=Setting::first();
        $category = Category::all();
        return view('home.edithouse1',[
            'data'=>$data,
            'setting'=>$setting,
            'category'=>$category
        ]);
    } 

    public function showhouse(House $house,$id){

        $data=House::find($id);
        $setting=Setting::first();
        $category = Category::all();
        return view('home.showhouse',[
            'data'=>$data,
            'setting'=>$setting,
            'category'=>$category
        ]);
    } 

    public function showhouse1(UserHouse $userhouse,$id){

        $data=UserHouse::find($id);
        $setting=Setting::first();
        $category = Category::all();
        return view('home.showhouse',[
            'data'=>$data,
            'setting'=>$setting,
            'category'=>$category
        ]);
    } 

    public function deletehouse(House $house,$id)
    {
        $data=House::find($id);
        $destination= 'storage/img/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect ('userpanel/myhouses');
    }

    public function deletehouse1(UserHouse $userhouse,$id)
    {
        $data=UserHouse::find($id);
        $destination= 'storage/img/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect ('userpanel/myhouses');
    }

    public function updatehouse(Request $request, House $house,$id)
    {
        $data=House::find($id);
        $data->category_id= $request->category_id;
        $data->user_id= Auth::id(); //$request->category_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->metre = $request->metre;
        $data->numberofrooms = $request->numberofrooms;
        $data->buildingage = $request->buildingage;
        $data->floorlocation = $request->floorlocation;
        $data->numberoffloors = $request->numberoffloors;
        $data->warmuptype = $request->warmuptype;
        $data->numberofbathrooms = $request->numberofbathrooms;
        $data->balcony = $request->balcony;
        $data->furnished = $request->furnished;
        $data->usingstatus = $request->usingstatus;
        $data->dues = $request->dues;
        $data->swap = $request->swap;
        $data->propertytype = $request->propertytype;
        $data->location = $request->location;
        $data->status = 'Edited';
        if ($request->hasFile('image')){
           
            $file= $request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('storage/img/',$filename);
            $data->image= $filename;
        }
        $data->save();
        return redirect ('userpanel/myhouses');

    } 

    public function updatehouse1(Request $request, UserHouse $userhouse,$id)
    {
        $data=UserHouse::find($id);
        $data->category_id= $request->category_id;
        $data->user_id= Auth::id(); //$request->category_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->price = $request->price;
        $data->metre = $request->metre;
        $data->numberofrooms = $request->numberofrooms;
        $data->buildingage = $request->buildingage;
        $data->floorlocation = $request->floorlocation;
        $data->numberoffloors = $request->numberoffloors;
        $data->warmuptype = $request->warmuptype;
        $data->numberofbathrooms = $request->numberofbathrooms;
        $data->balcony = $request->balcony;
        $data->furnished = $request->furnished;
        $data->usingstatus = $request->usingstatus;
        $data->dues = $request->dues;
        $data->swap = $request->swap;
        $data->propertytype = $request->propertytype;
        $data->location = $request->location;
        $data->status = 'Edited';
        if ($request->hasFile('image')){
           
            $file= $request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('storage/img/',$filename);
            $data->image= $filename;
        }
        $data->save();
        return redirect ('userpanel/myhouses');

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reviewdelete($id)
    {
        $data=Comment::find($id);
        $data->delete();
        return redirect (route('userpanel.reviews'));
    }

    public function destroyimage($pid,$id)
    {
        $data=Image::find($id);
        $destination= 'storage/img/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect()->route('userpanel.image.index',['pid'=>$pid]);
    }

    public function storeimage(Request $request,$pid)
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

        return redirect()->route('userpanel.image.index',['pid'=>$pid]);
    }

    public function indeximage($pid)
    {
        $house= House::find($pid);
        //$images= Image::where('house_id',$pid);
        $images= DB::table('images')->where('house_id',$pid)->get();
        return view('admin.image.index',[
            'house'=> $house,
            'images'=> $images
        ]);
    }

}
