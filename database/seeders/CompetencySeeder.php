<?php

namespace Database\Seeders;

use App\Models\Competency;
use Illuminate\Database\Seeder;

class CompetencySeeder extends Seeder
{
    public function run(): void
    {
        Competency::query()->delete();

        $behaviorals = [
            'Team Leadership','Communication','Stakeholder Management','Integrity & Compliance'
        ];
        $technicals = [
            'Financial Reporting','Cash Flow Management','Budgeting & Forecasting','Tax & VAT Compliance'
        ];
        $enablers = [
            'Problem Solving','Data Analysis','Excel/ERP Proficiency','Continuous Improvement'
        ];

        foreach ($behaviorals as $n) Competency::create(['name'=>$n,'type'=>'behavioral']);
        foreach ($technicals as $n)  Competency::create(['name'=>$n,'type'=>'technical']);
        foreach ($enablers as $n)    Competency::create(['name'=>$n,'type'=>'enabler']);
    }
}
