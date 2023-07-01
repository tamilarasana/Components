<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','category_type','description','status','user_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function images(){
        return $this->hasMany(Resourceimage::class);
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

}
