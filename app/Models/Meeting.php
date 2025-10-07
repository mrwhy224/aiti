<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'title',
        'description',
        'location',
        'start_time',
        'end_time',
        'status',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * دریافت تمام رکوردهای حضور و غیاب برای این جلسه
     */
    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }

    /**
     * دریافت مستقیم کاربران (Users) دعوت شده به این جلسه
     */
    public function users()
    {
        return $this->morphedByMany(User::class, 'attendable', 'attendees');
    }

    /**
     * دریافت مستقیم اعضا (Members) دعوت شده به این جلسه
     */
    public function members()
    {
        return $this->morphedByMany(CompanyMember::class, 'attendable', 'attendees');
    }

    /**
     * دریافت مستقیم مهمانان (Guests) دعوت شده به این جلسه
     */
    public function guests()
    {
        return $this->morphedByMany(Guest::class, 'attendable', 'attendees');
    }
}
