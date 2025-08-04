<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRole extends Pivot
{
    /**
     * The table associated with the model.
     */
    protected $table = 'user_roles';

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = true;

    /**
     * By setting this to null, we tell Laravel to only manage created_at.
     */
    const UPDATED_AT = null;
}
