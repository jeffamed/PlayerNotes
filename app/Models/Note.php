<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'comments',
        'player_id',
        'writer_id'
    ];

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }
}
