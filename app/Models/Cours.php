<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Cours extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "courses";
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'category_id',
        'instructor_id'
    ];
    public function categories()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function instructors()
    {
        return $this->hasOne(Instructors::class, 'id', 'instructor_id');
    }
}
