<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
    ];

    /**
     * دریافت تمام جلساتی که این مهمان به آن‌ها دعوت شده است
     */
    public function meetings()
    {
        return $this->morphToMany(Meeting::class, 'attendable', 'attendees');
    }
}
