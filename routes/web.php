<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\AdminHouseController;
use App\Http\Controllers\AdminPanel\HouseController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\MessageController;
use App\Http\Controllers\AdminPanel\FaqController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\AdminPanel\AdminUserHouseController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/loginuser',[HomeController::class,'loginuser'])->name('loginuser');;
Route::get('/registeruser',[HomeController::class,'registeruser'])->name('registeruser');;
Route::get('/logoutuser',[HomeController::class,'logout'])->name('logoutuser');
Route::view('/loginadmin','admin.login')->name('loginadmin');;
Route::post('/loginadmincheck',[HomeController::class,'loginadmincheck'])->name('loginadmincheck');
Route::post('/gethouse',[HomeController::class,'gethouse'])->name('gethouse');
Route::get('/houselist/{search}',[HomeController::class,'houselist'])->name('houselist');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/house/{id}',[HomeController::class,'house'])->name('house');
Route::get('/userhouse/{id}',[HomeController::class,'userhouse'])->name('userhouse');
Route::get('/categoryhouses/{id}/{slug}',[HomeController::class,'categoryhouses'])->name('categoryhouses');
Route::get('/',[HomeController::class,'index'])->name('admin');

Route::get('/deneme',[TestController::class,'deneme']);

Route::get('/faq',[HomeController::class,'faq'])->name(name:'faq');
//**********************ADMIN PAGE ROUTES**********************/

Route::get('about',[HomeController::class,'about'])->name(name:'about');
Route::get('/references',[HomeController::class,'references'])->name(name:'references');
Route::get('/contact',[HomeController::class,'contact'])->name(name:'contact');
Route::post('storemessage',[HomeController::class,'storemessage'])->name(name:'storemessage');
Route::post('storecomment',[HomeController::class,'storecomment'])->name(name:'storecomment');

//**********************USER AUTH CONTROL**********************/
Route::middleware('auth')->group(function() {

//**********************USER ROUTES**********************/
    Route::prefix('userpanel')->name('userpanel.')->controller(UserController::class)->group(function () {

        //**********************ADMIN USERHOUSE ROUTES**********************/
    Route::prefix('/userhouse')->name('userhouse.')->controller(AdminUserHouseController::class)->group(function () {

    Route::get('/','index')->name(name:'index');
    Route::get('/create','create')->name(name:'create');
    Route::post('/store','store')->name(name:'store');
    Route::get('/edit/{id}','edit')->name(name:'edit');
    Route::post('/update/{id}','update')->name(name:'update');
    Route::get('/show/{id}','show')->name(name:'show');
    Route::get('/delete/{id}','destroy')->name(name:'delete');
    }); 

    //**********************ADMIN IMAGE ROUTES**********************/
    Route::prefix('image')->name('image.')->controller(UserController::class)->group(function () {

    Route::get('/{pid}','indeximage')->name(name:'index');
    Route::post('/store/{pid}','storeimage')->name(name:'store');
    Route::get('/delete/{pid}/{id}','destroyimage')->name(name:'delete');
        }); 

        Route::get('/','index')->name('index');
        Route::get('/reviews','reviews')->name('reviews');
        Route::get('/myhouses','myhouses')->name('myhouses');
        Route::get('/reviewdelete/{id}','reviewdelete')->name('reviewdelete');
        Route::get('/addhouse',[UserController::class,'addhouse'])->name(name:'addhouse');
        Route::get('/edithouse/{id}',[UserController::class,'edithouse'])->name(name:'edithouse');
        Route::get('/edithouse1/{id}',[UserController::class,'edithouse1'])->name(name:'edithouse1');
        Route::post('/updatehouse/{id}',[UserController::class,'updatehouse'])->name(name:'updatehouse');
        Route::post('/updatehouse1/{id}',[UserController::class,'updatehouse1'])->name(name:'updatehouse1');
        Route::get('/showhouse/{id}',[UserController::class,'showhouse'])->name(name:'showhouse');
        Route::get('/showhouse1/{id}',[UserController::class,'showhouse1'])->name(name:'showhouse1');
        Route::get('/deletehouse/{id}',[UserController::class,'deletehouse'])->name(name:'deletehouse');
        Route::get('/deletehouse1/{id}',[UserController::class,'deletehouse1'])->name(name:'deletehouse1');
    });

//**********************ADMIN PANEL ROUTES**********************/
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

//**********************GENERAL ROUTES**********************/
Route::get('/setting',[AdminHomeController::class,'setting'])->name(name:'setting');
Route::post('/setting',[AdminHomeController::class,'settingUpdate'])->name(name:'setting.update');


//**********************ADMIN HOUSE ROUTES**********************/
Route::prefix('/house')->name('house.')->controller(AdminHouseController::class)->group(function () {

    Route::get('/','index')->name(name:'index');
    Route::get('/create','create')->name(name:'create');
    Route::post('/store','store')->name(name:'store');
    Route::get('/edit/{id}','edit')->name(name:'edit');
    Route::post('/update/{id}','update')->name(name:'update');
    Route::get('/show/{id}','show')->name(name:'show');
    Route::get('/delete/{id}','destroy')->name(name:'delete');
    });

 Route::get('',[AdminHomeController::class,'index'])->name(name:'index');
    
//**********************ADMIN CATEGORY ROUTES**********************/
Route::prefix('/category')->name('category.')->controller(AdminCategoryController::class)->group(function () {

Route::get('/','index')->name(name:'index');
Route::get('/create','create')->name(name:'create');
Route::post('/store','store')->name(name:'store');
Route::get('/edit/{id}','edit')->name(name:'edit');
Route::post('/update/{id}','update')->name(name:'update');
Route::get('/show/{id}','show')->name(name:'show');
Route::get('/delete/{id}','destroy')->name(name:'delete');
    });

//**********************ADMIN IMAGE ROUTES**********************/
Route::prefix('/image')->name('image.')->controller(ImageController::class)->group(function () {

    Route::get('/{pid}','index')->name(name:'index');
    Route::post('/store/{pid}','store')->name(name:'store');
    Route::get('/delete/{pid}/{id}','destroy')->name(name:'delete');
        });    

//**********************ADMIN MESSAGE ROUTES**********************/
Route::prefix('/message')->name('message.')->controller(MessageController::class)->group(function () {

    Route::get('/','index')->name(name:'index');
    Route::post('/update/{id}','update')->name(name:'update');
    Route::get('/show/{id}','show')->name(name:'show');
    Route::get('/delete/{id}','destroy')->name(name:'delete');
        });   
        
//**********************ADMIN FAQ ROUTES**********************/
Route::prefix('/faq')->name('faq.')->controller(FaqController::class)->group(function () {

    Route::get('/','index')->name(name:'index');
    Route::get('/create','create')->name(name:'create');
    Route::post('/store','store')->name(name:'store');
    Route::get('/edit/{id}','edit')->name(name:'edit');
    Route::post('/update/{id}','update')->name(name:'update');
    Route::get('/show/{id}','show')->name(name:'show');
    Route::get('/delete/{id}','destroy')->name(name:'delete');
    });        

//**********************ADMIN COMMENT ROUTES**********************/
Route::prefix('/comment')->name('comment.')->controller(CommentController::class)->group(function () {

    Route::get('/','index')->name(name:'index');
    Route::post('/update/{id}','update')->name(name:'update');
    Route::get('/show/{id}','show')->name(name:'show');
    Route::get('/delete/{id}','destroy')->name(name:'delete');
        });  


//**********************ADMIN USER ROUTES**********************/
Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function () {

    Route::get('/','index')->name(name:'index');
    Route::get('/edit/{id}','edit')->name(name:'edit');
    Route::post('/update/{id}','update')->name(name:'update');
    Route::get('/show/{id}','show')->name(name:'show');
    Route::get('/delete/{id}','destroy')->name(name:'delete');
    Route::post('/addrole/{id}','addrole')->name(name:'addrole');
    Route::get('/destroyrole/{uid}/{rid}','destroyrole')->name(name:'destroyrole');

        });          
        
    }); 
});