<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'user_id',
        'team',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
