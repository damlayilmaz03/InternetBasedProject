<?php

namespace App\Http\Controllers;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Image;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Message;
use App\Models\Faq;
use App\Models\Comment;
use App\Models\UserHouse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function count($id)
    {
        return Comment::where('house_id',$id)->where('status','True')->count();
    }
    public static function average($id)
    {
        return Comment::where('house_id',$id)->where('status','True')->average('rate');
    }

    public static function maincategorylist(){
        return Category::where('parent_id','=',0)->with('children')->get();
    }

    public function index(){
          
        $page='home';
        $sliderdata=House::limit(4)->where('status','True')->get();
        $houselist=House::limit(15)->where('status','True')->get();
        $housegallery=House::limit(200)->get();
        $setting=Setting::first();

        return view('home.index',[
            'page'=>$page,
            'setting'=>$setting,
            'sliderdata'=>$sliderdata,
            'houselist'=>$houselist,
            'housegallery'=>$housegallery,
        ]);
    }

    public function about(){

        $setting=Setting::first();

        return view('home.about',[
            'setting'=>$setting,
        ]);
    }

    public function references(){

        $setting=Setting::first();

        return view('home.references',[
            'setting'=>$setting,
        ]);
    }

    public function contact(){
        
        $setting=Setting::first();

        return view('home.contact',[
            'setting'=>$setting,
        ]);
    }

    public function faq(){
        
        $setting=Setting::first();
        $datalist=Faq::all();

        return view('home.faq',[
            'setting'=>$setting,
            'datalist'=>$datalist
        ]);
    }


    public function storemessage(Request $request){
        
        $data= new Message();
        $data->name=$request->input('name');
        $data->email=$request->input('email');
        $data->phone=$request->input('phone');
        $data->subject=$request->input('subject');
        $data->message=$request->input('message');
        $data->ip= request()->ip();
        $data->save();
        
        return redirect()->route('contact')->with('info','YOUR MESSAGE HAS BEEN SENT , THANK YOU.');
    }

    public function storecomment(Request $request){
        
       // dd($request);
        $data= new Comment();
        $data->user_id= Auth::id();
        $data->house_id=$request->input('house_id');
        $data->subject=$request->input('subject');
        $data->review=$request->input('review');
        $data->rate=$request->input('rate');
        $data->ip= request()->ip();
        $data->save();
        
        return redirect()->route('house',['id'=>$request->input('house_id') ])->with('success','YOUR COMMENT HAS BEEN SENT , THANK YOU.');
    }

    public function house($id){
        $category=Category::find($id);
        $data=House::find($id);
        $images= DB::table('images')->where('house_id',$id)->get();
        $setting=Setting::first(); 
        $reviews= Comment::where('house_id',$id)->where('status','True')->get();
        return view('home.house',[
            'category'=>$category,
            'data'=>$data,
            'images'=>$images,
            'setting'=>$setting,
            'reviews'=>$reviews
        ]);
    }


    public function categoryhouses($id){

        $category=Category::find($id);
        $houses= DB::table('houses')->where('category_id',$id)->where('status','True')->get();
        $setting=Setting::first();
        return view('home.categoryhouses',[
            'category'=>$category,
            'houses'=>$houses,
            'setting'=>$setting
            
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function loginadmincheck(Request $request)
    {
        //dd($request);
        $setting=Setting::first();
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'setting'=>$setting
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/admin');
        }
 
        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function gethouse(Request $request)
    {
        $search= $request->input('search');

        $count= House::where('title','like','%'.$search.'%')->get()->count();

        if($count==1)
        {
        $data= House::where('title','like','%'.$search.'%')->first();
        return redirect()->route('house',['id'=>$data->id,'slug'=>$data->slug]);
        }
        else
        {
            return redirect()->route('houselist',['search'=>$search]);
        }
    }

    public function houselist($search)
    {
        $datalist= House::where('title','like','%'.$search.'%')->get();
        $setting=Setting::first();
        return view('home.search_houses',
        ['search'=>$search,
        'datalist'=>$datalist,
        'setting'=>$setting
        

        ]);
    }

    public function loginuser()
    {
        
        $setting=Setting::first();
        return view('home.login',
        [
        'setting'=>$setting
        ]);
    }

    public function registeruser()
    {
        
        $setting=Setting::first();
        return view('home.register',
        [
        'setting'=>$setting
        ]);
    }
    
    
    
}
