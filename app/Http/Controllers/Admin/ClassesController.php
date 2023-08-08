<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassesRequest;
use App\Models\Categories;
use App\Models\Classes;
use App\Models\Cours;
use App\Models\Instructors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ClassesController extends Controller
{
    public function index() {
        $title = "Lớp học";
        $classes = Classes::all();
        return view('admin.class.index', compact('title','classes'));
    }
    public function add(ClassesRequest $request){
        $course = Cours::all();
        $instructors = Instructors::all();
        $title = "Thêm mới lớp học";
        if ($request->isMethod('POST')) { 
            $params = $request->except('_token');
            $classes = Classes::create($params);
            if($classes->id){
                Session::flash('success','Thêm mới thành công lớp học');
                return redirect()->route('route_classes_index');
            }
        }
        return view('admin.class.add', compact('title','course','instructors'));
    }

    public function  edit(ClassesRequest $request,$id) {
        $title = "Cập nhật khóa học";
        $classes = Classes::find($id);
        $course = Cours::all();
        $instructors = Instructors::all();

        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
        
           $result = Classes::where('id',$id)
               ->update($params);
           if ($result) {
               Session::flash('success','sửa thành công khóa học');
               return redirect()->route('route_classes_index',['id'=>$id]);
           }
        }
        return view('admin.class.edit',compact('classes','title','id','course','instructors'));
    }

    public function delete($id){
        Classes::where('id',$id)->delete();
        Session::flash('success','xóa thành công lớp học có id là'.$id);
        return redirect()->route('route_classes_index');
    }
}
