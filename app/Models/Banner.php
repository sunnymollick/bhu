<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function page()
    {
        return $this->belongsTo(\App\Models\Page::class, 'page_id');
    }
}
