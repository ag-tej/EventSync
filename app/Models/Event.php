<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id',
        'slug',
        'title',
        'tagline',
        'description',
        'category',
        'mode',
        'isPublished',
        'approx_participants',
        'team_size',
        'venue',
        'percent_complete',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function application()
    {
        return $this->hasMany(Application::class, 'event_id');
    }

    public function link()
    {
        return $this->hasOne(Link::class);
    }

    public function brand()
    {
        return $this->hasOne(Brand::class);
    }

    public function date()
    {
        return $this->hasOne(Date::class);
    }

    public function applicant()
    {
        return $this->hasMany(Applicant::class, 'event_id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class, 'event_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($events) {
            $events->slug = Str::slug($events->title . '-' . str::random());
        });
    }
}
