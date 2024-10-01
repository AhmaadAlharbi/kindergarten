<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['guardian_id', 'classroom_id', 'name', 'date_of_birth', 'civil_id'];

    public function guardian()
    {
        return $this->belongsTo(Guardian::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}