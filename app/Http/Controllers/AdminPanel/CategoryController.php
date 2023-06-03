<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Operator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Setting;


class CategoryController extends Controller
{


    protected $appends = [
        'getParentsTree'
    ];

    public static function getParentsTree($category,$title)
    {
        if($category->parent_id == 0)
        {
            return $title;
        }
        $parent = Category::find($category->parent_id);
        $title= $parent->title . '>' . $title;
        return CategoryController::getParentsTree($parent, $title);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Category::all();
        return view('admin.category.index',[

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
        return view('admin.category.create',[

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
        $data= new Category();
        $data->parent_id= $request->parent_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->status = $request->status;
        if ($request->hasFile('image')){
           
            $file= $request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('storage/img/',$filename);
            $data->image= $filename;
        }
        $data->save();

        return redirect('admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category,$id)
    {
        $data=Category::find($id);
        return view ('admin.category.show',[
           'data' => $data 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category,$id)
    {

        $data=Category::find($id);
        $datalist=Category::all();
        return view ('admin.category.edit',[
           'data' => $data ,
           'datalist' => $datalist 
        ]);

}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category,$id)
    {
        $data=Category::find($id);
        $data->parent_id= $request->parent_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->status = $request->status;
        if ($request->hasFile('image')){
           
            $file= $request->file('image');
            $extention= $file->getClientOriginalExtension();
            $filename= time().'.'.$extention;
            $file->move('storage/img/',$filename);
            $data->image= $filename;
        }
        $data->save();
        return redirect ('admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category,$id)
    {
        $data=Category::find($id);
        $destination= 'storage/img/'.$data->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect ('admin/category');
    }
}
