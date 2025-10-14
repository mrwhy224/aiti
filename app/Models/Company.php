<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Company extends Model
{
    protected $fillable = [
        'name',
        'national_id',
        'creator_id',
        'is_confirmed',
    ];
    public function manager(): HasOne
    {
        return $this->hasOne(User::class)
            ->whereHas('roles', function ($query) {
                $query->where('name', 'company_manager');
            });
    }
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
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(CompanyCategory::class, 'company_category');
    }
}
