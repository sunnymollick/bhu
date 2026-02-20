<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempleEvent extends Model
{
    protected $fillable = [
        'temple_id',
        'event_name',
        'banner_image',
        'location',
        'event_date',
        'event_date_end',
        'event_time_start',
        'event_time_end',
        'schedule',
        'short_description',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_date_end' => 'date',
        'status' => 'boolean'
    ];

    public function temple()
    {
        return $this->belongsTo(Temple::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function galleries()
    {
        return $this->hasMany(TempleEventGallery::class, 'temple_event_id');
    }
}
