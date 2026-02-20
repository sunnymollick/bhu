<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'user_id',
        'job_category_id',
        'job_industry_id',
        'company',
        'job_title',
        'job_type',
        'work_mode',
        'division_id',
        'district_id',
        'deadline',
        'about',
        'requirements',
        'preferred_experience',
        'responsibilities',
        'why_join_us',
        'is_approved'
    ];

    protected $casts = [
        'is_approved' => 'boolean',
    ];

    public function division() {
        return $this->belongsTo(\App\Models\Division::class, 'division_id');
    }

    public function district() {
        return $this->belongsTo(\App\Models\District::class, 'district_id');
    }

    public function jobCategory() {
        return $this->belongsTo(\App\Models\JobCategory::class, 'job_category_id');
    }

    public function jobIndustry() {
        return $this->belongsTo(\App\Models\JobIndustry::class, 'job_industry_id');
    }

    public function user() {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
