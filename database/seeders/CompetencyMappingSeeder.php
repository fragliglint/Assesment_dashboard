<?php

namespace Database\Seeders;

use App\Models\Competency;
use App\Models\CompetencyMapping;
use App\Models\JobTitle;
use App\Models\KeyAccountability;
use Illuminate\Database\Seeder;

class CompetencyMappingSeeder extends Seeder
{
    public function run(): void
    {
        CompetencyMapping::query()->delete();

        $dgm = JobTitle::where('name','Deputy General Manager – Accounts & Finance')->first();

        $mapAll = [
            'Team Leadership','Communication','Stakeholder Management',
            'Financial Reporting','Budgeting & Forecasting','Cash Flow Management',
            'Problem Solving'
        ];

        foreach (Competency::whereIn('name', $mapAll)->get() as $c) {
            CompetencyMapping::create([
                'job_title_id' => $dgm->id,
                'key_accountability_id' => null,
                'competency_id' => $c->id,
            ]);
        }

        $kpiReport = KeyAccountability::where('job_title_id',$dgm->id)
            ->where('accountability','LIKE','Prepare balance sheet%')->first();

        foreach (Competency::whereIn('name', ['Financial Reporting','Data Analysis','Excel/ERP Proficiency'])->get() as $c) {
            CompetencyMapping::create([
                'job_title_id' => $dgm->id,
                'key_accountability_id' => $kpiReport?->id,
                'competency_id' => $c->id,
            ]);
        }
    }
}
