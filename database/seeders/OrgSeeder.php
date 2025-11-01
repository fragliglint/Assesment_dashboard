<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Department;
use App\Models\Division;
use App\Models\SubDepartment;
use App\Models\WorkLevel;
use App\Models\Designation;
use Illuminate\Database\Seeder;

class OrgSeeder extends Seeder
{
    public function run(): void
    {
        $akh = Company::where('name','AKH Knitting & Dyeing Ltd.')->first();
        $div = Division::create(['name' => 'Finance & Accounts', 'company_id' => $akh->id]);

        $dept = Department::create(['name' => 'Accounts & Finance', 'division_id' => $div->id]);
        SubDepartment::create(['name' => 'Accounts', 'department_id' => $dept->id]);
        SubDepartment::create(['name' => 'Finance', 'department_id' => $dept->id]);

        $wl1 = WorkLevel::create(['name' => 'WL-1']);
        $wl2 = WorkLevel::create(['name' => 'WL-2']);
        $wl3 = WorkLevel::create(['name' => 'WL-3']);

        Designation::create(['name' => 'Assistant', 'work_level_id' => $wl1->id]);
        Designation::create(['name' => 'Executive', 'work_level_id' => $wl2->id]);
        Designation::create(['name' => 'Manager', 'work_level_id' => $wl3->id]);
    }
}
