<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// creating the products model and its relationship with the category model
class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'price', 'image'];

    public function category()
    {
        // this means that the x(this) product belongs to one category
        return $this->belongsTo(Category::class);
    }

    // creating a scope for the search
    public function scopeSearch($query, $search)
    {
        $query->where('name', 'like', "%{$search}%")
            ->orWhere('category_id', 'like', "%{$search}%")
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            });
    }
}
