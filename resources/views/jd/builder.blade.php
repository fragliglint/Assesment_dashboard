@extends('layouts.app')

@section('content')
<div class="w-full h-full">
    <!-- Topbar -->
    <div class="w-full bg-white shadow p-4 flex gap-6 items-center">
        <div class="w-1/2">
            <label class="block text-sm text-gray-600 mb-1">Enter Job title</label>
            <select wire:model.live="selectedJobTitleId" class="w-full border rounded p-2">
                <option value="">Select job title</option>
                @foreach($jobTitles as $jt)
                    <option value="{{ $jt->id }}">{{ $jt->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="w-1/2">
            <label class="block text-sm text-gray-600 mb-1">Enter reports to</label>
            <select wire:model.live="selectedReportsToId" class="w-full border rounded p-2">
                <option value="">Select supervisor</option>
                @foreach($reportsToOptions as $rt)
                    <option value="{{ $rt->id }}">{{ $rt->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex gap-4 p-4">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white shadow rounded p-4 space-y-4">
            <h3 class="text-gray-700 font-semibold">ASSESSMENT</h3>
            <div>
                <label class="text-xs text-gray-600">COMPANY</label>
                <select wire:model.live="selectedCompanyId" class="w-full border rounded p-2 mt-1">
                    <option value="">SELECT COMPANY</option>
                    @foreach($companies as $c)
                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-xs text-gray-600">DIVISION</label>
                <select wire:model.live="selectedDivisionId" class="w-full border rounded p-2 mt-1">
                    <option value="">SELECT DIVISION</option>
                    @foreach($divisions as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-xs text-gray-600">DEPARTMENT</label>
                <select wire:model.live="selectedDepartmentId" class="w-full border rounded p-2 mt-1">
                    <option value="">SELECT DEPARTMENT</option>
                    @foreach($departments as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-xs text-gray-600">SUB DEPARTMENT</label>
                <select wire:model.live="selectedSubDepartmentId" class="w-full border rounded p-2 mt-1">
                    <option value="">SELECT SUB DEPARTMENT</option>
                    @foreach($subDepartments as $sd)
                        <option value="{{ $sd->id }}">{{ $sd->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-xs text-gray-600">WORK LEVEL</label>
                <select wire:model.live="selectedWorkLevelId" class="w-full border rounded p-2 mt-1">
                    <option value="">SELECT WORK LEVEL</option>
                    @foreach($workLevels as $wl)
                        <option value="{{ $wl->id }}">{{ $wl->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-xs text-gray-600">DESIGNATION</label>
                <select wire:model.live="selectedDesignationId" class="w-full border rounded p-2 mt-1">
                    <option value="">SELECT DESIGNATION</option>
                    @foreach($designations as $dg)
                        <option value="{{ $dg->id }}">{{ $dg->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-xs text-gray-600">EMPLOYEE NAME OR ID</label>
                <input wire:model.live="employeeId" type="text" placeholder="ENTER EMPLOYEE NAME OR ID" class="w-full border rounded p-2 mt-1" />
                @if($employeeName)
                    <p class="text-xs text-green-700 mt-1">Job Holder: {{ $employeeName }}</p>
                @endif
            </div>
        </div>

        <!-- JD Builder -->
        <div class="w-2/4 bg-white shadow rounded p-4">
            <div class="flex items-center justify-between">
                <label class="font-semibold">Include Key Accountabilities</label>
                <div class="space-x-2">
                    <button wire:click="selectAllKA" class="px-3 py-1 text-sm bg-slate-100 rounded border">Select All</button>
                    <button wire:click="clearAllKA" class="px-3 py-1 text-sm bg-slate-100 rounded border">Clear All</button>
                    <button wire:click="addCustomKA" class="px-3 py-1 text-sm bg-indigo-600 text-white rounded">Add Custom</button>
                </div>
            </div>

            <div class="mt-3 overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="w-14 p-2 text-left">Use</th>
                            <th class="w-2/5 p-2 text-left">Key Accountability</th>
                            <th class="w-1/4 p-2 text-left">KPI</th>
                            <th class="w-1/4 p-2 text-left">Measurement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($keyAccountabilities as $i => $row)
                            <tr class="border-t">
                                <td class="p-2">
                                    <input type="checkbox" wire:model.live="keyAccountabilities.{{ $i }}.use" class="w-4 h-4">
                                </td>
                                <td class="p-2">
                                    <textarea wire:model.live="keyAccountabilities.{{ $i }}.accountability" class="w-full border rounded p-2" rows="2"></textarea>
                                </td>
                                <td class="p-2">
                                    <input type="text" wire:model.live="keyAccountabilities.{{ $i }}.kpi" class="w-full border rounded p-2">
                                </td>
                                <td class="p-2">
                                    <input type="text" wire:model.live="keyAccountabilities.{{ $i }}.measurement" class="w-full border rounded p-2">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <button wire:click="saveJd" class="px-4 py-2 bg-emerald-600 text-white rounded">Save JD</button>
                @if (session('saved'))
                    <span class="ml-3 text-sm text-emerald-700">{{ session('saved') }}</span>
                @endif
            </div>
        </div>

        <!-- Live Preview -->
        <div class="w-1/4">
            @include('jd.partials.live_preview', ['organogram' => $organogram])
        </div>
    </div>
</div>
@endsection
