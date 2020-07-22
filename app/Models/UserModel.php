<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = "tbuser";

    protected $hidden = ['password'];

    protected $fillable = [
    	"username",
        "nama",
        "password",
    	"role"
    ];
}
