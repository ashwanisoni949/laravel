<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoWebsiteResult extends Model
{
    use HasFactory;

    protected $table = 'seo_website_result';

    protected $fillable = ['website_id', 'result_title_id', 'result_value', 'month','year'];

    public function seowebsiteresult()
    {
        return $this->belongsTo(SeoResult::class,);
    }
}
