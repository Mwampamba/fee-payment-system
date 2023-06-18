<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Semester;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicYear extends Model
{
    use HasFactory;
    
    protected $table = 'academic_years';
    
    protected $fillable = [
        'name', 
        'status'
    ];

    public function semester()
    {
        return $this->hasMany(Semester::class);
    }

    public function class()
    {
        return $this->hasMany(Classes::class);
    }

}
