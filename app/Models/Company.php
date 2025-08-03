<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class);
    }
    public function creator(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    // A company can have many members (phone book)
    public function members(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CompanyMember::class);
    }

    // A company can have many attributes (many-to-many)
    public function companyAttributes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CompanyAttribute::class);
    }
}
