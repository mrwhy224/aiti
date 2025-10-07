<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Attendee extends Model
{
    protected $fillable = [
        'meeting_id',
        'attendable_id',
        'attendable_type',
        'status',
        'role',
    ];

    /**
     * دریافت جلسه‌ای که این رکورد به آن تعلق دارد
     */
    public function meeting()
    {
        return $this->belongsTo(Meeting::class);
    }

    /**
     * دریافت مدل والد (User, Member, یا Guest)
     */
    public function attendable(): MorphTo
    {
        return $this->morphTo();
    }
}
