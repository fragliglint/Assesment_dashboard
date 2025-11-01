<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $akh = Company::where('name','AKH Knitting & Dyeing Ltd.')->first();
        $dgm = JobTitle::where('name','Deputy General Manager – Accounts & Finance')->first();

        Employee::updateOrCreate(
            ['employee_id' => 'E-0001'],
            ['name' => 'Abul Basher', 'company_id' => $akh->id, 'job_title_id' => $dgm->id]
        );
    }
}
