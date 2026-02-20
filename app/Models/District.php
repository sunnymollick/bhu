<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'name_bn', 'division_id'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function upazilas()
    {
        return $this->hasMany(Upazila::class);
    }

    public function unions()
    {
        return $this->hasMany(Union::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
