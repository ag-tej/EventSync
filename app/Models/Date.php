<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'application_open',
        'application_close',
        'rsvp',
        'event_begins',
        'event_ends',
    ];

    protected $casts = [
        'event_begins' => 'datetime:Y-m-d',
        'event_ends' => 'datetime:Y-m-d',
        'application_open' => 'datetime:Y-m-d',
        'application_close' => 'datetime:Y-m-d',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
