<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'category_name','meta_keywords','slug_category','category_desc','category_status'
    ];
    protected $primaryKey = 'id';
    protected $table = 'category';
    public function product(){
        return $this->hasMany('App\Models\Product');
    }
}
