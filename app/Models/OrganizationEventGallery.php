<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationEventGallery extends Model
{
    protected $fillable = [
        'picture',
        'organization_id',
        'organization_event_id',
        'status',
        'created_by',
        'updated_by'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function organizationEvent()
    {
        return $this->belongsTo(OrganizationEvent::class, 'organization_event_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class);
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
