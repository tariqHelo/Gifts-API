<?php

namespace App\Imports;

use App\Models\ProductDetails;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
class ProductDetailsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    { 
       //DB::table('product_details')->truncate();
        foreach ($rows as $row) 
        {  
            //dd($row[0]); 
            if($row[0] == null):
                continue;
            endif;
            ProductDetails::create([
                 'name'               => $row[0],
                 'number'             => $row[1],
                 'type'               => $row[2],
                 'barcode'            => $row[3],
                 'qty'                => $row[4],
                 'price'              => $row[5],
                 'purchasing_price'   => $row[6],
                 'purchasing_price2'  => $row[7],
                 'personalization'    => $row[8],
                 'brand'              => $row[9],
            ]);
        }
    }
}
