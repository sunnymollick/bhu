<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public function businessCategory()
    {
        return $this->belongsTo(\App\Models\BusinessCategory::class, 'business_category_id');
    }
}
