<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempleEventGallery extends Model
{
    protected $fillable = [
        'picture',
        'temple_id',
        'temple_event_id',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function templeEvent()
    {
        return $this->belongsTo(TempleEvent::class, 'temple_event_id');
    }

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
}
