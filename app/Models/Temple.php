<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;

class Temple extends Model
{
    protected $fillable = [
        'name',
        'name_bn',
        'picture',
        'address',
        'latitude',
        'longitude',
        'description',
        'division_id',
        'district_id',
        'upazila_id',
        'created_by',
        'updated_by',
        'union_parisad',
        'village',
        'city_corp',
        'ward',
        'thana',
        'post_office',
        'zipcode',
        'contact_name',
        'contact_no',
        'designation',
        'nid',
        'main_picture',
        'status',
        'approval_status',
        'approved_by',
        'approved_at',
        'residential_facility'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function gallery()
    {
        return $this->hasMany(\App\Models\TempleGallery::class);
    }

    public function activities()
    {
        return $this->hasMany(\App\Models\TempleActivities::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
