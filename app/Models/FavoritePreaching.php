<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FavoritePreaching extends Model
{
    use HasFactory;

    protected $fillable=['user_id','preaching_id'];

    /**
     * Get the preaching that owns the FavoritePreaching
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function preaching(): BelongsTo
    {
        return $this->belongsTo(Preaching::class, 'preaching_id');
    }

    /**
     * Get the user that owns the FavoritePreaching
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
