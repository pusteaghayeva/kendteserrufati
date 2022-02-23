<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category',  'content', 'status'];
    public function categoryname()
    {
        return $this->hasOne(Category::class, 'id', 'category');
    }
}
