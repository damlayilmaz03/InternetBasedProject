<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\House;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;


class AdminHouseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = House::all();
        return view('admin.house.index', [

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
        $data = Category::all();
        return view('admin.house.create',[

            'data'=> $data

        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new House();
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
        $data->status = $request->status;
        if ($request->hasFile('image')){
           
            $file= $request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('storage/img/',$filename);
            $data->image= $filename;
        }
        $data->save();

        return redirect('admin/house');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house,$id)
    {
        $data=House::find($id);
        return view ('admin.house.show',[
           'data' => $data 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house,$id)
    {

        $data=House::find($id);
        $datalist=Category::all();
        return view ('admin.house.edit',[
           'data' => $data ,
           'datalist' => $datalist 
        ]);

}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house,$id)
    {
        $data=House::find($id);
        $data->category_id= $request->category_id;
        $data->user_id= $request->user_id; //$request->category_id;
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
        $data->status = $request->status;
        if ($request->hasFile('image')){
           
            $file= $request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('storage/img/',$filename);
            $data->image= $filename;
        }
        $data->save();
        return redirect ('admin/house');

    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house,$id)
    {
        $data=House::find($id);
        $destination= 'storage/img/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect ('admin/house');
    }
}
