<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;
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