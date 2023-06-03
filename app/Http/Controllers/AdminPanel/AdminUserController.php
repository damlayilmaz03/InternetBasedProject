<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use App\Models\Setting;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        $setting=Setting::first();
        return view('admin.user.index', [

            'data'=> $data,
            'setting'=>$setting    
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
        $data=User::find($id);
        $roles=Role::all();
        $setting=Setting::first();
        return view ('admin.user.show',[
           'data' => $data, 
           'roles'=>$roles,
           'setting'=>$setting
        ]);
    }

    public function addrole(Request $request, $id)
    {
        $data=new RoleUser();
        $data->user_id= $id;
        $data->role_id= $request->role_id;
        $data->save();
        return redirect (route('admin.user.show',['id'=>$id]));
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
    public function destroyrole($uid,$rid)
    {
        $user= User::find($uid);
        $user->roles()->detach($rid);
        return redirect(route('admin.user.show',['id'=>$uid]));
    }

    public function destroy($id)
    {
        $user= User::find($id);
        $user->delete();
        return redirect(route('admin.user.index'));
    }
}
