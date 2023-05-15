<?php


namespace Modules\SEO\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSubmissionWebsites extends Model
{
    use HasFactory;

    protected $table = 'seo_submission_websites';

    protected $fillable = ['website_id', 'seo_task_id', 'website_url', 'website_username','website_password','page_rank','created_at','submission_websites_id','created_by','updated_at','modified_by','status'];

    public $timestamps = false;

    public function SeoSetting()
    {
        return $this->belongsTo(SeoTask::class,'seo_task_id','id');
    }

    public function SeoWebsite()
    {
        return $this->belongsTo(Website::class,'website_id','id');
    }
}
