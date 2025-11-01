<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{
    Company, Division, Department, SubDepartment, WorkLevel, Designation,
    Employee, JobTitle, KeyAccountability, Competency, CompetencyMapping, JdEntry
};

class JdBuilder extends Component
{
    // Topbar
    public $selectedJobTitleId = null;
    public $selectedReportsToId = null;

    // Sidebar hierarchy
    public $selectedCompanyId = null;
    public $selectedDivisionId = null;
    public $selectedDepartmentId = null;
    public $selectedSubDepartmentId = null;
    public $selectedWorkLevelId = null;
    public $selectedDesignationId = null;

    // Employee
    public $employeeId = '';
    public $employeeName = '';

    // JD Builder
    public $keyAccountabilities = []; // [{id, use, accountability, kpi, measurement}]
    public $behavioralCompetencies = [];
    public $technicalCompetencies = [];
    public $enablers = [];

    // Options
    public $companies = [];
    public $divisions = [];
    public $departments = [];
    public $subDepartments = [];
    public $workLevels = [];
    public $designations = [];
    public $jobTitles = [];
    public $reportsToOptions = [];

    protected $rules = [
        'selectedCompanyId' => 'required|integer',
        'selectedJobTitleId' => 'required|integer',
    ];

    public function mount()
    {
        $this->companies = Company::orderBy('name')->get();
        $this->workLevels = WorkLevel::orderBy('name')->get();
        $this->designations = Designation::orderBy('name')->get();
        $this->jobTitles = JobTitle::orderBy('name')->get();
        $this->reportsToOptions = $this->jobTitles;
    }

    // Sidebar cascading
    public function updatedSelectedCompanyId()
    {
        $this->divisions = Division::where('company_id', $this->selectedCompanyId)->orderBy('name')->get();
        $this->selectedDivisionId = $this->selectedDepartmentId = $this->selectedSubDepartmentId = null;
    }

    public function updatedSelectedDivisionId()
    {
        $this->departments = Department::where('division_id', $this->selectedDivisionId)->orderBy('name')->get();
        $this->selectedDepartmentId = $this->selectedSubDepartmentId = null;
    }

    public function updatedSelectedDepartmentId()
    {
        $this->subDepartments = SubDepartment::where('department_id', $this->selectedDepartmentId)->orderBy('name')->get();
        $this->selectedSubDepartmentId = null;
    }

    // Employee lookup
    public function updatedEmployeeId()
    {
        $emp = Employee::where('employee_id', trim($this->employeeId))->first();
        if ($emp) {
            $this->employeeName = $emp->name;
            $this->selectedCompanyId = $emp->company_id;
            $this->updatedSelectedCompanyId();
        }
    }

    public function updatedSelectedJobTitleId()
    {
        $this->loadKeyAccountabilities();
        $this->selectedReportsToId = optional(JobTitle::find($this->selectedJobTitleId))->reports_to_job_title_id;
        $this->refreshCompetencies();
    }

    public function updatedKeyAccountabilities()
    {
        $this->refreshCompetencies();
    }

    public function selectAllKA()
    {
        foreach ($this->keyAccountabilities as &$row) $row['use'] = true;
        $this->refreshCompetencies();
    }

    public function clearAllKA()
    {
        foreach ($this->keyAccountabilities as &$row) $row['use'] = false;
        $this->refreshCompetencies();
    }

    public function addCustomKA()
    {
        $this->keyAccountabilities[] = [
            'id' => null,
            'use' => true,
            'accountability' => '',
            'kpi' => '',
            'measurement' => '',
        ];
        $this->refreshCompetencies();
    }

    protected function loadKeyAccountabilities()
    {
        $this->keyAccountabilities = [];
        if (!$this->selectedJobTitleId) return;

        $rows = KeyAccountability::where('job_title_id', $this->selectedJobTitleId)->get();
        foreach ($rows as $r) {
            $this->keyAccountabilities[] = [
                'id' => $r->id,
                'use' => true,
                'accountability' => $r->accountability,
                'kpi' => $r->kpi,
                'measurement' => $r->measurement,
            ];
        }
    }

    protected function refreshCompetencies()
    {
        if (!$this->selectedJobTitleId) return;

        $activeKaIds = collect($this->keyAccountabilities)
            ->filter(fn($r) => $r['use'] && $r['id'])
            ->pluck('id')->all();

        $byJob = CompetencyMapping::with('competency')
            ->where('job_title_id', $this->selectedJobTitleId)
            ->whereNull('key_accountability_id')
            ->get()
            ->pluck('competency');

        $byKA = empty($activeKaIds) ? collect() :
            CompetencyMapping::with('competency')
                ->where('job_title_id', $this->selectedJobTitleId)
                ->whereIn('key_accountability_id', $activeKaIds)
                ->get()
                ->pluck('competency');

        $all = $byJob->merge($byKA)->unique('id');

        $this->behavioralCompetencies = $all->where('type','behavioral')->pluck('name')->values()->all();
        $this->technicalCompetencies  = $all->where('type','technical')->pluck('name')->values()->all();
        $this->enablers               = $all->where('type','enabler')->pluck('name')->values()->all();
    }

    public function organogramChain()
    {
        $chain = [];
        $node = JobTitle::find($this->selectedJobTitleId);
        while ($node) {
            $chain[] = $node->name;
            $node = $node->reportsTo;
        }
        return array_reverse($chain);
    }

    public function saveJd()
    {
        $this->validate();

        $payloadKa = collect($this->keyAccountabilities)
            ->filter(fn($r) => $r['use'])
            ->values()->all();

        JdEntry::create([
            'company_id' => $this->selectedCompanyId,
            'employee_id' => optional(Employee::where('employee_id', $this->employeeId)->first())->id,
            'job_title_id' => $this->selectedJobTitleId,
            'reports_to_job_title_id' => $this->selectedReportsToId,
            'key_accountabilities' => $payloadKa,
            'behavioral' => implode("\n", $this->behavioralCompetencies),
            'technical'  => implode("\n", $this->technicalCompetencies),
            'enabler'    => implode("\n", $this->enablers),
        ]);

        $this->dispatchBrowserEvent('jd-saved');
        session()->flash('saved', 'JD saved successfully.');
    }

    public function render()
    {
        return view('jd.builder', [
            'companies' => $this->companies,
            'divisions' => $this->divisions,
            'departments' => $this->departments,
            'subDepartments' => $this->subDepartments,
            'workLevels' => $this->workLevels,
            'designations' => $this->designations,
            'jobTitles' => $this->jobTitles,
            'reportsToOptions' => $this->reportsToOptions,
            'organogram' => $this->organogramChain(),
        ]);
    }
}
