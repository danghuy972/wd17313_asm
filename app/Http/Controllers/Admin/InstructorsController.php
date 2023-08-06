<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructors;
use Illuminate\Http\Request;

class InstructorsController extends Controller
{
    public function index() {
        $title = "Giảng viên";
        $instructors = Instructors::all();
        return view('admin.instructor.index', compact('title','instructors'));
    }
}
