<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Union extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_bn',
        'division_id',
        'district_id',
        'upazila_id',
    ];

    /**
     * Get the division that owns the union.
     */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    /**
     * Get the district that owns the union.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the upazila that owns the union.
     */
    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }
}
