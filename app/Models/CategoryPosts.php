<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPosts extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'category_posts_name','category_posts_desc','category_posts_status','category_posts_slug','meta_keywords'
    ];
    protected $primaryKey = 'category_posts_id';
    protected $table = 'category_posts';
    public function posts(){
        return $this->hasMany('App\Models\Posts');
    }
}
