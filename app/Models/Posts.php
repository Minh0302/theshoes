<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at'
    ];
    public $timestamps = false;
    protected $fillable = [
        'cate_posts_id','posts_title','posts_slug','posts_desc','posts_content','meta_keywords','posts_status','posts_image','created_at'
    ];
    protected $primaryKey = 'id';
    protected $table = 'posts';
    public function categoryposts(){
        return $this->belongsTo('App\Models\CategoryPosts','cate_posts_id','category_posts_id');
    }
}
