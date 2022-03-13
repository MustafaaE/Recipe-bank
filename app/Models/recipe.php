<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    // use HasFactory;
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function categories()
    {
        return $this->hasOne(Category::class);
    }
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
