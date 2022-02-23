<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsImage extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'news_id'];

    public function multimg()
    {
        return $this->belongsToMany(News::class, 'id', 'news_id');
    }
}
