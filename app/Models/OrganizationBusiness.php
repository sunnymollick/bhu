<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationBusiness extends Model
{
    protected $fillable = [
        'organization_id',
        'business_id'
    ];

    public function business()
    {
        return $this->belongsTo(\App\Models\Business::class, 'business_id');
    }
}
