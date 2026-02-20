<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'location',
        'date_time',
        'what',
        'who',
        'when',
        'where',
        'why',
        'how',
        'victim_testimony',
        'witness_statement',
        'opposition_reaction',
        'government_response',
        'media_coverage',
        'attachments',
        'contact',
        'is_confidential',
        'created_by',
        'status',
        'approved_by',
        'approved_at',
        'final_news',
        'edited_by',
        'composed_by'
    ];

    protected $casts = [
        'attachments' => 'array',
        'is_confidential' => 'boolean',
        'date_time' => 'datetime',
        'approved_at' => 'datetime',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'edited_by');
    }
}
