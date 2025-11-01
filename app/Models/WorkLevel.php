<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkLevel extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function designations()
    {
        return $this->hasMany(Designation::class);
    }
}
