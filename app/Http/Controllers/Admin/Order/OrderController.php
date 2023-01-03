<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function index(){
        $users = user::orderBy("id","DESC")->paginate(5);
        return view("backend/orders/order", ["users"=>$users]);
    }
    public function detail(){
        return view("backend/orders/detailorder");
    }
    public function delete(){
        return "del";
    }
}
