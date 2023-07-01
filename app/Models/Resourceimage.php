<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resourceimage extends Model
{
    use HasFactory;

    protected $fillable = ['resource_id','user_id','resourceimg'];

   
    public function resource(){
        return $this->belongsTo(Resource::class);
    }
}
