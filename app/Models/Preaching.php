<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Preaching extends Model
{
    use HasFactory;
    protected $fillable=['title','preacher_name','preaching_url','church_id'];
    /**
     * Get the church that owns the Preaching
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function church(): BelongsTo
    {
        return $this->belongsTo(Church::class, 'church_id');
    }

}
