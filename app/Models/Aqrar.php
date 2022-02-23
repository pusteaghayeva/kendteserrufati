<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aqrar extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['title', 'content',  'image',   'status', 'file', 'categories'];
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'categories');
    }
}
