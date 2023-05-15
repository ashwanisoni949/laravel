<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;

    protected $table = 'blog-image';
    protected $fillable = [
        'name','category_id','images','status'
     ];
    //  protected $casts = [
    //     'images' => 'array'
    // ];

}
