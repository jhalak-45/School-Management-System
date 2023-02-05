<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $guarded=['id'];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
    public function class()
    {
        return $this->belongsTo(Grade::class);
    }
}
