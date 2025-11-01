<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use App\Models\KeyAccountability;
use Illuminate\Database\Seeder;

class KeyAccountabilitySeeder extends Seeder
{
    public function run(): void
    {
        KeyAccountability::query()->delete();

        $dgm = JobTitle::where('name','Deputy General Manager – Accounts & Finance')->first();

        $rows = [
            ['Manage, supervise, and guide the Accounts & Finance team','Team performance and compliance','≥ 95% team KPIs met'],
            ['Conduct training to enhance team skills','No. of training sessions conducted','≥ 4 sessions/year'],
            ['Manage organizational cash flow and liquidity','Cash sufficiency and no fund shortage','100% months covered'],
            ['Provide financial information to management for decision making','Accuracy and clarity of reports','≥ 98% reports error-free'],
            ['Prepare balance sheet, P&L, and cash flow statements','Accuracy of financial statements','≥ 98% accuracy'],
            ['Supervise timely reporting of statutory returns','Timely report delivery against deadline','100% on time'],
            ['Monitor expenditures and analyse revenue variance','Variance from budgeted vs. actual','≤ 5% variance'],
        ];

        foreach ($rows as $r) {
            KeyAccountability::create([
                'job_title_id' => $dgm->id,
                'accountability' => $r[0],
                'kpi' => $r[1],
                'measurement' => $r[2],
            ]);
        }
    }
}
