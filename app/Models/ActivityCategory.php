<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityCategory extends Model
{
    public function activities()
    {
        return $this->hasMany(Activity::class, 'activity_category_id');
    }
}
