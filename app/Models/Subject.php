<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'department_id'];

    // A subject belongs to a department
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // Optionally, a subject can have many teachers
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}