<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Law extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content',  'image',   'status', 'file', 'categories'];
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categories');
    }
}
