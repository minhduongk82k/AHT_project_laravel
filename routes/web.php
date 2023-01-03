<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Order\OrderController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Site\Cart\CartController;
use App\Http\Controllers\Site\Category\CategoryController as CategoryCategoryController;
use App\Http\Controllers\Site\Product\ProductController as ProductProductController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/test",function(){
    // $data = DB::table('products')->join("categories","products.categories_id","=","categories.id")
    // ->select("products.name as product_name","categories.name as category_name")            
    // ->get()->all();
    // dd($data);
});
Route::get("/test1",[TestController::class,"test1"]);
Route::get("/test2",[TestController::class,"test2"]);

Route::get("/upload","TestController@frmUpload");
Route::post("/upload","TestController@frmUpload");


// Route::get("/test2/{data1}/{data2}",[TestController::class,"test2"]);
// Route::get("/index",[AdminController::class,"index"]);


Route::get("/login",[AuthController::class,"getLogin"])->middleware("checkLogin");
Route::post("/login",[AuthController::class,"postLogin"])->middleware("checkLogin");

Route::group(["prefix"=>"admin","middleware"=>"checkAdmin"],function(){
    Route::get("/",[AdminController::class,"index"]);
    Route::get("/logout",[AdminController::class,"logout"]);

    Route::prefix('product')->group(function () {
        Route::get("/",[ProductController::class,"index"]);
        Route::get("/create",[ProductController::class,"create"]);
        Route::post("/store",[ProductController::class,"store"]);
        Route::get("/edit/{id}",[ProductController::class,"edit"]);
        Route::post("/update/{id}",[ProductController::class,"update"]);
        Route::get("/delete/{id}",[ProductController::class,"delete"]);
    });
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class,"index"]);
        Route::get('/create',[UserController::class,"create"]);
        Route::post('/store',[UserController::class,"post"]);
        Route::get("/edit",[UserController::class,"edit"]);
        Route::post("/update",[UserController::class,"update"]);
        Route::get("/delete",[UserController::class,"delete"]);
        
    });
    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class,"index"]);
        Route::get('/create',[CategoryController::class,"create"]);
        Route::post('/store',[CategoryController::class,"post"]);
        Route::get("/edit",[CategoryController::class,"edit"]);
        Route::post("/update",[CategoryController::class,"update"]);
        Route::get("/delete",[CategoryController::class,"delete"]);
    });
    Route::prefix('order')->group(function () {
        Route::get("/",[OrderController::class,"index"]);
        Route::get("/detail",[OrderController::class,"detail"]);
    });
});

//FRONTEND

Route::group(["prefix"=>"/"],function(){

    Route::get("/", [SiteController::class,"index"]);
    Route::get("/ve-chung-toi", [SiteController::class,"about"]);
    Route::get("/lien-he", [SiteController::class,"contact"]);

    Route::group(["prefix"=>"/danh-muc"],function(){
        Route::get("/{slug}.html",[CategoryCategoryController::class, "index"]);
        
    }); 
    
    Route::group(["prefix"=>"/san-pham"],function(){
        Route::get("/",[ProductProductController::class,"shop"]);
        Route::get("/{slug}.html",[ProductProductController::class,"details"]);
        Route::get("/tim-kiem",[ProductProductController::class,"filter"]);

    });

    Route::group(["prefix"=>"/gio-hang"],function(){
        Route::get("/",[CartController::class,"cart"]);
        Route::get("/them-hang/{id}",[CartController::class,"addToCart"]);
        Route::get("/cap-nhat-gio-hang/{id}/{qty}",[CartController::class,"update"]);
        Route::get("/xoa-hang/{id}",[CartController::class,"delete"]);
        Route::get("/thanh-toan.html",[CartController::class,"checkout"]);
        Route::post("/thanh-toan",[CartController::class,"payment"]);
        Route::get("/hoan-thanh",[CartController::class,"complete"]);

    });
});
