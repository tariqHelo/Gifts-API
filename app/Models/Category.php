<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

      protected $fillable = [
        'name', 'sequence', 'parent_id', 'status', 'image_path',
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

}
