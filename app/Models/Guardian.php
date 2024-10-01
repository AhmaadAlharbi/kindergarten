<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    protected $fillable = [
        'father_name',
        'father_phone',
        'father_email',
        'father_civil_id',
        'father_address',
        'father_job',
        'mother_name',
        'mother_phone',
        'mother_email',
        'mother_civil_id',
        'mother_address',
        'mother_job',
    ];
}