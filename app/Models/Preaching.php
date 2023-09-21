<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preaching extends Model
{
    use HasFactory;
    protected $fillable=['title','preacher_name','preaching_url','church_id'];
    
}
