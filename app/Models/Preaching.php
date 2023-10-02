<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    /**
     * Get the favoritePreaching associated with the Preaching
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function favoritePreaching(): HasOne
    {
        return $this->hasOne(FavoritePreaching::class);
    }

    public function getFavoriteState():bool{
        $favorite=FavoritePreaching::where('user_id',1)
            ->where('preaching_id',$this->id)
            ->first();
        if ($favorite != null) {
          return true;
        } else {
            return false;
        }
        
    }

}
