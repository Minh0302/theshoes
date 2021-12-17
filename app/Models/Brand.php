<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'brand_name','meta_keywords','slug_brand','brand_desc','brand_status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'brand';
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
