<?php

namespace App\Models;

use App\Models\Classes;
use App\Models\Programme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'email',
        'reg_number',
        'class_id',
        'programme_id',
        'profile',
        'password',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function programme()
    {
        return $this->belongsTo(Programme::class);
    } 
}
