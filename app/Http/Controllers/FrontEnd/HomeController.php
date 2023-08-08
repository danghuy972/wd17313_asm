<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Cours;
use App\Models\Instructors;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function trangchu(){
    //     $title = "Trang chủ";
    //     $cours = Cours::latest()->limit(6)->get();
    //     $categories = Categories::latest()->limit(8)->get();
    //     $instructors = Instructors::latest()->limit(4)->get();
    //     return view('layouts.app', compact('title','cours','categories','instructors'));
    // }

    public function home(){
        $title = "Trang chủ";
        $cours = Cours::latest()->limit(6)->get();
        $categories = Categories::latest()->limit(8)->get();
        $instructors = Instructors::latest()->limit(4)->get();
        return view('layouts.home', compact('title','cours','categories','instructors'));
    }

    public function courses(){
        $title = "Khóa học";
        $courses = Cours::all();
        $categories = Categories::all();
        return view('layouts.courses', compact('title','courses','categories'));
    }

    public function chitiet($id){
        $title = "Chi tiết khóa học";
        $categories = Categories::all();
        $courses = Cours::find($id);
        return view('layouts.chitet', compact('title','courses','categories'));
    }
}
