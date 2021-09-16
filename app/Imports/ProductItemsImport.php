<?php

namespace App\Imports;

use App\Models\ProductItems;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use DB;
class ProductItemsImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    { 
        foreach ($rows as $row) 
        {
            //dd($row);
            
        ///   $exists = ProductItems::get()->toArray();
                $exists = ProductItems::where('name',$row[0])
                ->first();
               // dd($exists);
               if ($exists) {
                    //LOGIC HERE TO UPDATE
                    $exists->update([
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
                   // return null;
               }else{
                 if($row[0] == null):
                    continue;
                endif;
                $data = new Product;
                $data->name = $row[0];
                $data->save();
                ProductItems::Create([
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
                    'product_id'         => $data->id,
                ]);
               }

               
             
        }
    }
}
