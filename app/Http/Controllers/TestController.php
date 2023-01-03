<?php

namespace App\Http\Controllers;

use App\Demo\Demo;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Product;
use App\Models\Test;
use App\Models\User;
use Illuminate\Http\Request;



class TestController extends Controller
{
    //
    public function frmUpload(){
        return view("test1");
    }
    
    public function test1(Request $request){

        return view("test1");

    }
    public function test2(Request $request){
        $categories = Category::all()->toArray();
        
        function showCategories($categories,$parent,$char){
            foreach($categories as $category){
                if($category["parent"] == $parent){
                    echo $char.$category['name']."</br>";
                    $newParent = $category["id"];
                    echo showCategories($categories,$newParent,$char."|-- ");
                }
            }
        }
        showCategories($categories, 0, "");

    }
    
}
