<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = ['name', 'name_bn'];

    public function districts()
    {
        return $this->hasMany(District::class);
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
