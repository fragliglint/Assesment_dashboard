<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'work_level_id'];

    public function workLevel()
    {
        return $this->belongsTo(WorkLevel::class);
    }
}
