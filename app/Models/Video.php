<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_video', 'video' 
    ];
    public function units()
    {
        return $this->belongsToMany(Unit::class,'video_units');
    }
}
