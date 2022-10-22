<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Video;
use App\Models\Exam;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year_type',
    ];

    public function videos()
    {
        return $this->belongsToMany(Video::class,'video_units');
    }
    public function exams()
    {
        return $this->belongsToMany(Exam::class,'unit_exams');
    }
}
