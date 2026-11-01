<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'dept_name',
        'manager_name',
        'location',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}