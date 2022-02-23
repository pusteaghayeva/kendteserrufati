<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'image',  'content', 'status'];
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function multimg()
    {
        return $this->hasMany(NewsImage::class, 'news_id', 'id');
    }

}


 


