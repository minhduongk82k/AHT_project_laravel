<?php

namespace App\Http\Controllers\Site\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index($slug){

        $data["categories"] = Category::all();

        $data["products"] = Category::where("slug",$slug)
            ->first()
            ->product()
            ->orderBy("id","desc")
            ->paginate(6);
        
            return view("frontend/product/shop", $data);
        
    }
}
