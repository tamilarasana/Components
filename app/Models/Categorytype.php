<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorytype extends Model
{
    use HasFactory;
    

    protected $fillable = ['category_id','title','description','user_id','css','html','javascript'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

}
