<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    public function businesses(){
        return $this->hasMany(\App\Models\Business::class, 'business_category_id');
    }
}