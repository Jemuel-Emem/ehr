<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    use HasFactory;

    protected $fillable = [
        'patientid',
        'name',
        'dateofbirth',
        'contactinformation',
        'medicalhistory',
        'currentmedications',
        'allergies',
        'status',
    ];

    protected $casts = [
        'dateofbirth' => 'datetime:Y-m-d',
    ];
}
