<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class RequestLog extends Model
{
    use HasFactory;

    /**
     * A log entry should never be updated, so we only use created_at.
     */
    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'requestable_id',
        'requestable_type',
        'session_id',
        'ip_address',
        'user_agent',
        'url',
        'method',
        'status_code',
        'referrer',
    ];

    /**
     * Get the user that the log belongs to.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the parent requestable model (Post, Product, etc.).
     */
    public function requestable(): MorphTo
    {
        return $this->morphTo();
    }
}
