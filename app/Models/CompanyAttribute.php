<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyAttribute extends Model
{
    public function companies(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
