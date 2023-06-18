<?php

namespace App\Models;

use App\Models\Student;
use App\Models\Programme;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';

    protected $fillable = [
        'name', 
        'programme_id',
        'academic_year_id'
    ];

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    }

    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}
