<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galleryİmages extends Model
{
    use HasFactory;
    protected $fillable = [ 'image',   'gallery_id'];
}
