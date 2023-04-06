<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;
    protected $fillable = [
        'site_name',
        'contact_mobile',
        'contact_email',
        'social_facebook',
        'social_twitter',
        'social_linkedin',
        'site_logo',
    ];
}
