<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        Department::create([
            'dept_name' => 'Information Technology',
            'manager_name' => 'David',
            'location' => 'Building A',
        ]);

        Department::create([
            'dept_name' => 'Business Administration',
            'manager_name' => 'John',
            'location' => 'Building B',
        ]);

        Department::create([
            'dept_name' => 'Accounting',
            'manager_name' => 'Sara',
            'location' => 'Building C',
        ]);
    }
}