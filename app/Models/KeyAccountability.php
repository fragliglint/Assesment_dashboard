<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KeyAccountability extends Model
{
    use HasFactory;

    protected $fillable = ['job_title_id', 'accountability', 'kpi', 'measurement'];

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }
}
