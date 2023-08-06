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
}
