<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JdEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'employee_id',
        'job_title_id',
        'reports_to_job_title_id',
        'key_accountabilities',
        'behavioral',
        'technical',
        'enabler',
    ];

    protected $casts = [
        'key_accountabilities' => 'array',
    ];

    public function company() { return $this->belongsTo(Company::class); }
    public function employee() { return $this->belongsTo(Employee::class); }
    public function jobTitle() { return $this->belongsTo(JobTitle::class); }
    public function reportsTo() { return $this->belongsTo(JobTitle::class, 'reports_to_job_title_id'); }
}
