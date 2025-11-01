<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id', 'name', 'company_id', 'job_title_id', 'department_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
