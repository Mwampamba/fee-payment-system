<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programme extends Model
{
    use HasFactory;
    protected $table = 'programmes';

    protected $fillable = [
        'name',
        'fee',
        'status'
    ];

    public function classes()
    {
        return $this->hasMany(Classes::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
