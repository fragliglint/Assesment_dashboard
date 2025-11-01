<?php

namespace Database\Seeders;

use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    public function run(): void
    {
        JobTitle::query()->delete();

        $cfo = JobTitle::create(['name' => 'Chief Financial Officer']);
        $gm  = JobTitle::create(['name' => 'GM – Finance & Accounts', 'reports_to_job_title_id' => $cfo->id]);
        $dgm = JobTitle::create(['name' => 'Deputy General Manager – Accounts & Finance', 'reports_to_job_title_id' => $gm->id]);
        $agm = JobTitle::create(['name' => 'AGM – Accounts & Finance', 'reports_to_job_title_id' => $dgm->id]);

        $accMgr   = JobTitle::create(['name' => 'Accounts Manager', 'reports_to_job_title_id' => $dgm->id]);
        $finMgr   = JobTitle::create(['name' => 'Finance Manager', 'reports_to_job_title_id' => $dgm->id]);
        $accOff   = JobTitle::create(['name' => 'Accounts Officer', 'reports_to_job_title_id' => $accMgr->id]);
        $finOff   = JobTitle::create(['name' => 'Finance Officer', 'reports_to_job_title_id' => $finMgr->id]);
        $finAsst  = JobTitle::create(['name' => 'Finance Assistant', 'reports_to_job_title_id' => $finMgr->id]);
        $accAsst  = JobTitle::create(['name' => 'Accounts Assistant', 'reports_to_job_title_id' => $accMgr->id]);
    }
}
