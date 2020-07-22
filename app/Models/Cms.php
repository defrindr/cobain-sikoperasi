<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    protected $table = "cms";
    protected $fillable = [
    	"app_name",
    	"copyright",
    	"denda_perhari",
    	"copyright"
    ];
}
