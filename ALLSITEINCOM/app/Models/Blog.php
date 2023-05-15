<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blogs';
    protected $fillable = [
        'title','slug','category_slug','image','short_descption','description','view','status','start_date','end_date'
     ];

     public function blogCategory(){
        return $this->belongsTo(Category::class,'category_slug','slug');
    }
}
