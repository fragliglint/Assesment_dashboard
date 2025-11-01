<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CompanySeeder::class,
            OrgSeeder::class,
            JobTitleSeeder::class,
            KeyAccountabilitySeeder::class,
            CompetencySeeder::class,
            CompetencyMappingSeeder::class,
            EmployeeSeeder::class,
        ]);
    }
}
