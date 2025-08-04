<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Attachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'attachable_id',
        'attachable_type',
        'file_path',
        'original_name',
        'mime_type',
        'size',
    ];

    /**
     * Get the parent attachable model (Invoice, Payment, etc.).
     */
    public function attachable(): MorphTo
    {
        return $this->morphTo();
    }
}
