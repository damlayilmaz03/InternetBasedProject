<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\UserHouse;
use Illuminate\Support\Facades\File;
use App\Models\House;
use Illuminate\Support\Facades\Auth;

class AdminUserHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserHouse::all();
        return view('admin.userhouse.index', [

            'data'=> $data

        ]);
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
        $data= new UserHouse();
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
        $data->status = 'New';
        if ($request->hasFile('image')){
           
            $file= $request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('storage/img/',$filename);
            $data->image= $filename;
        }
        $data->save();

        return redirect('userpanel/myhouses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserHouse $userhouse,$id)
    {
        $data=UserHouse::find($id);
        return view('admin.userhouse.show',[
           'data' => $data 
        ]);
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
        $data=UserHouse::find($id);
        $data->status= $request->status;
        $data->save();

        if($data->status=='True')
        {    
        $data1= new House();
        $data1->category_id= $data->category_id;
        $data1->user_id= $data->user_id; //$request->category_id;
        $data1->title = $data->title;
        $data1->keywords = $data->keywords;
        $data1->description = $data->description;
        $data1->detail = $data->detail;
        $data1->price = $data->price;
        $data1->metre = $data->metre;
        $data1->numberofrooms = $data->numberofrooms;
        $data1->buildingage = $data->buildingage;
        $data1->floorlocation = $data->floorlocation;
        $data1->numberoffloors = $data->numberoffloors;
        $data1->warmuptype = $data->warmuptype;
        $data1->numberofbathrooms = $data->numberofbathrooms;
        $data1->balcony = $data->balcony;
        $data1->furnished = $data->furnished;
        $data1->usingstatus = $data->usingstatus;
        $data1->dues = $data->dues;
        $data1->swap = $data->swap;
        $data1->propertytype = $data->propertytype;
        $data1->location = $data->location;
        $data1->status = 'True';
        $data1->image= $data->image;
        $data1->save();


        $data=UserHouse::find($id);
        $data->delete();
        }
        
        return redirect (route('admin.house.index',['id'=>$id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserHouse $userhouse,$id)
    {
        $data=UserHouse::find($id);
        $destination= 'storage/img/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect ('/userpanel/userhouse');
    }
}
