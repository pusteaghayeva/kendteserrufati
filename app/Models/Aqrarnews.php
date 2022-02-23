<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aqrarnews extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'image',  'content', 'file', 'status'];
    public function aqrarcategory()
    {
        return $this->hasOne(Aqrarcategory::class, 'id', 'category_id');
    }
}
