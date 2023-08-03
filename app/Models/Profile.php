<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'occupation',
        'dietary_preference',
        'allergies',
        'contact_number',
        'city',
        'province',
        'country',
        'postal_code',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
