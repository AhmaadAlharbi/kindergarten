<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    // A department has many subjects
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
}