<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aqrarcategory extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'status'];
    public function aqrarcategory()
    {
        return $this->hasOne(Aqrarcategory::class, 'id', 'category_id');
    }
}
