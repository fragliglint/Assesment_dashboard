<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobTitle extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'reports_to_job_title_id'];

    public function reportsTo()
    {
        return $this->belongsTo(JobTitle::class, 'reports_to_job_title_id');
    }

    public function subordinates()
    {
        return $this->hasMany(JobTitle::class, 'reports_to_job_title_id');
    }

    public function keyAccountabilities()
    {
        return $this->hasMany(KeyAccountability::class);
    }
}
