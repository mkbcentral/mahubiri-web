<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Church extends Model
{
    use HasFactory;
    protected $fillable=['name','abreviation','phone','email','logo_url'];
    /**
     * Get all of the preachings for the Church
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function preachings(): HasMany
    {
        return $this->hasMany(Preaching::class);
    }
}
