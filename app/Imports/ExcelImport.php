<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_id'    => $row[0], 
            'brand_id'    => $row[1],
            'product_name'    => $row[2],  
            'meta_keywords'    => $row[3], 
            'slug_product'    => $row[4], 
            'product_quantity'    => $row[5], 
            'product_sold'    => $row[6], 
            'product_price'    => $row[7], 
            'product_desc'    => $row[8], 
            'product_content'    => $row[9],
            'product_image'    => $row[10],
            'product_image1'    => $row[11],
            'product_image2'    => $row[12],
            'product_status'    => $row[13],
        ]);
    }
}
