<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'student_name' => 'John Doe',
            'email' => 'john@example.com',
            'gender' => 'Male',
            'enrollment_date' => now(),
            'description' => 'IT Student',
            'department_id' => 1,
        ]);

        Student::create([
            'student_name' => 'Alice Smith',
            'email' => 'alice@example.com',
            'gender' => 'Female',
            'enrollment_date' => now(),
            'description' => 'Business Student',
            'department_id' => 2,
        ]);
    }
}