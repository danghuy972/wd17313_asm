<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Classes extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "classes";
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'location',
        'course_id',
        'instructor_id'
    ];
    public function course()
    {
        return $this->hasOne(Cours::class, 'id', 'course_id');
    }
    public function instructor()
    {
        return $this->hasOne(Instructors::class, 'id', 'instructor_id');
    }
}
