<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo_url', 'address'];

    public function divisions()
    {
        return $this->hasMany(Division::class);
    }
}
