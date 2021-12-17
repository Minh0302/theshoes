<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'category_id','brand_id','product_name','meta_keywords','slug_product','product_quantity','product_sold','product_price','product_desc','product_content','product_image','product_image1','product_image2','product_status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'product';
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id','id');
    }
}
