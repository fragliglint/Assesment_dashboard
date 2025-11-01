<div class="bg-white shadow rounded p-4 text-xs leading-5">
    <div class="flex items-center gap-3">
        <div class="w-12 h-12 bg-gray-100 border flex items-center justify-center">
            @php $company = $companies->firstWhere('id', $selectedCompanyId); @endphp
            @if($company && $company->logo_url)
                <img src="{{ $company->logo_url }}" alt="logo" class="max-w-full max-h-12">
            @else
                <span class="text-[10px]">LOGO</span>
            @endif
        </div>
        <div class="flex-1">
            <p class="font-semibold">{{ $company->name ?? 'Company Name' }}</p>
            <p class="text-[10px]">{{ $company->address ?? 'Company Address' }}</p>
        </div>
        <div class="text-[10px] text-gray-500">Page 1 of 3</div>
    </div>

    <div class="border mt-3">
        <div class="grid grid-cols-4">
            <div class="col-span-1 px-2 py-1 bg-slate-50 border-r">JOB TITLE:</div>
            <div class="col-span-3 px-2 py-1">{{ optional($jobTitles->firstWhere('id',$selectedJobTitleId))->name }}</div>

            <div class="col-span-1 px-2 py-1 bg-slate-50 border-t border-r">DEPARTMENT:</div>
            <div class="col-span-3 px-2 py-1 border-t">
                {{ optional($departments->firstWhere('id',$selectedDepartmentId))->name }}
            </div>

            <div class="col-span-1 px-2 py-1 bg-slate-50 border-t border-r">JOB HOLDER:</div>
            <div class="col-span-3 px-2 py-1 border-t">
                {{ $employeeName ?: '—' }}
            </div>

            <div class="col-span-1 px-2 py-1 bg-slate-50 border-t border-r">REPORTS TO:</div>
            <div class="col-span-3 px-2 py-1 border-t">
                {{ optional($jobTitles->firstWhere('id',$selectedReportsToId))->name }}
            </div>
        </div>
    </div>

    <div class="mt-3">
        <p class="font-semibold">PURPOSE:</p>
        <p class="text-[11px]">Manages, supervises, and provides guidance to the Accounts & Finance Department team to ensure effective financial stewardship and service delivery.</p>
    </div>

    <div class="mt-3">
        <p class="font-semibold">ORGANOGRAM</p>
        <div class="border p-3">
            @foreach($organogram as $idx => $node)
                <div class="text-center">
                    <div class="inline-block border px-2 py-1 text-[11px] bg-slate-50">{{ $node }}</div>
                </div>
                @if($idx < count($organogram)-1)
                    <div class="flex justify-center py-1"><div class="w-px h-4 bg-gray-400"></div></div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="mt-3">
        <p class="font-semibold">KEY ACCOUNTABILITIES</p>
        <table class="w-full border text-[11px]">
            <thead class="bg-slate-50">
                <tr>
                    <th class="border p-1 w-10">SN</th>
                    <th class="border p-1">KEY ACCOUNTABILITIES</th>
                    <th class="border p-1">KPI</th>
                    <th class="border p-1">MEASUREMENTS</th>
                </tr>
            </thead>
            <tbody>
            @php $sn = 1; @endphp
            @foreach($keyAccountabilities as $row)
                @if($row['use'])
                <tr>
                    <td class="border p-1 text-center">{{ $sn++ }}</td>
                    <td class="border p-1">{{ $row['accountability'] }}</td>
                    <td class="border p-1">{{ $row['kpi'] }}</td>
                    <td class="border p-1">{{ $row['measurement'] }}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        <p class="font-semibold">BEHAVIORAL COMPETENCIES</p>
        <ul class="list-disc ml-4">
            @foreach($behavioralCompetencies as $c)
                <li>{{ $c }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-3">
        <p class="font-semibold">TECHNICAL COMPETENCIES</p>
        <ul class="list-disc ml-4">
            @foreach($technicalCompetencies as $c)
                <li>{{ $c }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-3">
        <p class="font-semibold">ENABLERS</p>
        <ul class="list-disc ml-4">
            @foreach($enablers as $c)
                <li>{{ $c }}</li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        <div class="grid grid-cols-3 gap-3">
            <div class="border-t pt-4 text-center text-[11px]">Prepared By</div>
            <div class="border-t pt-4 text-center text-[11px]">Reviewed By</div>
            <div class="border-t pt-4 text-center text-[11px]">Approved By</div>
        </div>
        <p class="text-[10px] text-gray-500 mt-4">This is a system generated document.</p>
    </div>
</div>
