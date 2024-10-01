<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }
    // A grade can have many students indirectly through classrooms
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}