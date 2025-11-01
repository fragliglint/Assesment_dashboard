<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        Company::query()->delete();

        Company::create([
            'name' => 'AKH Knitting & Dyeing Ltd.',
            'logo_url' => '/storage/logos/akh.png',
            'address' => '92, Rajfulbaria, Tetuljhora, Savar, Dhaka-1347',
        ]);

        Company::create([
            'name' => 'Blue Textile Group',
            'logo_url' => '/storage/logos/blue.png',
            'address' => 'Plot 7, EPZ Avenue, Dhaka',
        ]);
    }
}
