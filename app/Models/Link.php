<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'twitter_link',
        'linkedin_link',
        'discord_link',
        'facebook_link',
        'instagram_link',
        'website_link',
        'contact_email',
        'code_of_conduct',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
