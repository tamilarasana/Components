<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Resource;
use App\Models\Categorytype;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','user_id','categorytype'];



    public function resource(){
        return $this->hasMany(Resource::class);
    }

     public function categorytype(){
        return $this->hasMany(Categorytype::class);
    }
}
