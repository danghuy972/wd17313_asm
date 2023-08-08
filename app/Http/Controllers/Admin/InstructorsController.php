<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorsRequest;
use App\Models\Instructors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InstructorsController extends Controller
{
    public function index() {
        $title = "Giảng viên";
        $instructors = Instructors::all();
        return view('admin.instructor.index', compact('title','instructors'));
    }

    public function add(InstructorsRequest $request){
        $title = "Thêm mới giảng viên";
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            // nếu như tồn tại file thì sẽ upfile lên
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile('hinh',$request->file('image'));
            }
            $instructors = Instructors::create($params);

            if($instructors->id){
                Session::flash('success','Thêm mới thành công giảng viên');
                return redirect()->route('route_instructors_index');
            }
        }
        return view('admin.instructor.add', compact('title'));
    }

    public function  edit(InstructorsRequest $request,$id) {
        $title = "Cập nhật giảng viên";
        $instructors = Instructors::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
              $resultDL = Storage::delete('/public/'.$instructors->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('hinh',$request->file('image'));
              }
            } else {
                $params['image'] = $instructors->image;
            }
           $result = Instructors::where('id',$id)
               ->update($params);
           if ($result) {
               Session::flash('success','sửa thành công giảng viên');
               return redirect()->route('route_instructors_edit',['id'=>$id]);
           }
        }
        return view('admin.instructor.edit',compact('instructors','title','id'));
    }

    public function delete($id){
        Instructors::where('id',$id)->delete();
        Session::flash('success','xóa thành công giảng viên có id là'.$id);
        return redirect()->route('route_instructors_index');
    }
}
