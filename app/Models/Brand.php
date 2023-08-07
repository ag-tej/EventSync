<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'logo',
        'banner',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
