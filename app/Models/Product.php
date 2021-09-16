<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'category_id','details', 'status', 'description',
    ];

    
    protected $casts = [
        'details' => 'array'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id')
            ->withDefault('Technology');
    }
    // public function detalis()
    // {
    // return $this->hasMany(ProductDetails::class);
    // }
}
