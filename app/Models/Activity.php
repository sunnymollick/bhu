<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public function activityCategory()
    {
        return $this->belongsTo(ActivityCategory::class);
    }

    public function category()
    {
        return $this->belongsTo(ActivityCategory::class, 'activity_category_id');
    }

    public function templeActivities()
    {
        return $this->hasMany(TempleActivities::class);
    }

    public function temples()
    {
        return $this->belongsToMany(Temple::class, 'temple_activities', 'activity_id', 'temple_id');
    }
}
