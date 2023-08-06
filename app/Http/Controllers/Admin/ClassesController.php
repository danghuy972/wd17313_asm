<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index() {
        $title = "Lớp học";
        $classes = Classes::all();
        return view('admin.class.index', compact('title','classes'));
    }
}
