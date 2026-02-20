<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'description',
        'logo',
        'division_id',
        'district_id',
        'created_by',
        'updated_by',
        'approved_by',
        'approved_at',
        'status'
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    public function division(){
        return $this->belongsTo(\App\Models\Division::class, 'division_id');
    }

    public function district(){
        return $this->belongsTo(\App\Models\District::class, 'district_id');
    }

    public function businesses()
    {
        return $this->hasMany(\App\Models\OrganizationBusiness::class);
        // return $this->belongsToMany(\App\Models\OrganizationBusiness::class, 'organization_business', 'organization_id', 'business_id');
    }

    public function creator()
    {
        return $this->belongsTo(\App\Models\User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(\App\Models\User::class, 'approved_by');
    }
}
