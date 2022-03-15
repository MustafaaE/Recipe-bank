<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $fillable = ['category'];

    public function recipe()
    {
        return $this->belongsToMany(Recipe::class, 'recipe_id', 'id');
    }
}
