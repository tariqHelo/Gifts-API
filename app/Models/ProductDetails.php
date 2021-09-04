<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;
   protected $fillable = [
        'name',
        'number',
        'type',
        'barcode',
        'qty',
        'price',
        'purchasing_price',
        'purchasing_price2',
        'personalization',
        'brand'
   ];
    
}
