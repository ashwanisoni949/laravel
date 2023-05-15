<?php

namespace Modules\SEO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $table = 'seo_websites';

    protected $fillable = [
        'website_id',
        'website_name',
        'website_url',
        'countries_id',
        'start_date',
        'status',
        'user_id'
    ];
    
    public $timestamps = false;
    
    public function Country()
    {
        return $this->belongsTo(Country::class, 'countries_id','id');
    }
    
    public function Website()
    {
        return $this->belongsTo(WorkReport::class, 'website_id','website_id');
    }
}
