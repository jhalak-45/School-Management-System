<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;
    protected $fillable=[
        'faculty_name',
        'faculty_id',
        'description',
        'image'
    ];
    protected $table='faculties';
    protected $primarykey='id';

    public function grades(){
        return $this->hasMany(Grade::class);
    }
    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }

}
