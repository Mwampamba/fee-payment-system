<?php

namespace App\Models;

use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';
    
    protected $fillable = [
        'name',
        'academic_year_id',
        'status',
    ];


    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

}
