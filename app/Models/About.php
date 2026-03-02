<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class About extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'short_description',
        'who_we_are_title',
        'who_we_are_content',
        'mission_title',
        'mission_content',
        'gallery',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'gallery' => 'array',
        'status' => 'boolean',
    ];

    /**
     * Get the user who created the about content.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who updated the about content.
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Scope a query to only include active about content.
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Get the first active about content.
     */
    public static function getContent()
    {
        return self::active()->first();
    }
}
