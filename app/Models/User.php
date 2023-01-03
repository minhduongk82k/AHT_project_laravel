<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "fullname",
        "password",
        "email",
        "phone",
        "address",
        "level",
    ];

    protected $hidden = [
        "password",
    ];

    public function detail(){
        return $this->hasOne(Detail::class,"users_id","id");
    }

}
