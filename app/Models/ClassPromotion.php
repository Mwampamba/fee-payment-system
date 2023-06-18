<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Programme;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassPromotion extends Model
{
    use HasFactory;
    protected $table = 'class_promotions';

    protected $fillable = [
        'class_id', 
        'programme_id',
        'to_class_id', 
        'to_programme_id',
        'academic_year_id',
        'new_academic_year_id'
    ]; 

    public function from_class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function from_programme()
    {
        return $this->belongsTo(Programme::class, 'programme_id');
    } 

    public function from_academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function to_class()
    {
        return $this->belongsTo(Classes::class, 'to_class_id');
    }

    public function to_programme()
    {
        return $this->belongsTo(Programme::class, 'to_programme_id');
    }
 
    public function to_academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'new_academic_year_id');
    }
}
