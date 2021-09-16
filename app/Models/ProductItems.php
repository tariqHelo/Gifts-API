<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItems extends Model
{
    use HasFactory;

     protected $fillable = [
        'name',
        'product_id',
        'number',
        'type',
        'barcode',
        'qty',
        'price',
        'purchasing_price',
        'purchasing_price2',
        'personalization',
        'brand',
        'image'
   ];
}
