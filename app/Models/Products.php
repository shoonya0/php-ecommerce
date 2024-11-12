<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// creating the products model and its relationship with the category model
class Products extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'price', 'image'];

    public function category()
    {
        // this means that the x(this) product belongs to one category
        return $this->belongsTo(Category::class);
    }
}
