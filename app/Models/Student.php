<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'guardian_id', 'grade_id', 'classroom_id', 'date_of_birth', 'civil_id'];
    protected $casts = [
        'date_of_birth' => 'date', // Automatically cast to Carbon instance
    ];
    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}