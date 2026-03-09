<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'primary_email',
        'secondary_email',
        'primary_phone',
        'secondary_phone',
        'address',
        'facebook_url',
        'linkedin_url',
        'x_url',
        'youtube_url',
        'map_embed',
        'updated_by',
    ];

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
