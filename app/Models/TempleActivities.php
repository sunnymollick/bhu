<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempleActivities extends Model
{
    public function temple()
    {
        return $this->belongsTo(Temple::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
