<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $guarded='id';
    protected $fillable=[
        'name',
        'image',
        'contact_number',
        'academic_post',
        'teacher_id',
        'email',
        'faculty_id',
        'qualification'
    ];
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
