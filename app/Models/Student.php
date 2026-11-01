<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'email',
        'gender',
        'enrollment_date',
        'description',
        'department_id',
    ];

    protected $casts = [
        'enrollment_date' => 'date',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}