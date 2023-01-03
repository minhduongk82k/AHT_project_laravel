<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::orderBy("id","DESC")->paginate(3);
        // $users = DB::table('users')
        //             ->select("id","email","fullname","address","phone","level")
        //             ->orderBy("id","desc")
        //             ->get()
        //             ->all();
        return view("backend/users/listuser",["users"=>$users]);
    }
    public function create(){
        return view("backend/users/adduser");
    }
    public function store(){
        return view("backend/users/adduser");
    }
    public function edit(){
        return view("backend/users/edituser");
    }
    public function update(){
        return view("backend/users/edituser");
    }
    public function delete(){
        return "del";
    }
}
