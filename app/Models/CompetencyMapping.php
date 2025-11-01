<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompetencyMapping extends Model
{
    use HasFactory;

    protected $fillable = ['job_title_id', 'key_accountability_id', 'competency_id'];

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function keyAccountability()
    {
        return $this->belongsTo(KeyAccountability::class);
    }

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }
}
