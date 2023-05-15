<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoSubmissionWebsites extends Model
{
    use HasFactory;

    protected $table = 'seo_submission_websites';

    protected $fillable = ['website_id', 'seo_task_id', 'website_url', 'website_username','website_password','page_rank','date_added','submission_websites_id','created_by','last_modified','modified_by','status'];

    public $timestamps = false;

}
