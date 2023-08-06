<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CoursRequest;
use App\Models\Cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CoursController extends Controller
{
    public function index() {
        $title = "Khóa học";
        $cours = Cours::all();
        return view('admin.cours.index',compact('title','cours'));
        //tạo 1 route add-student và view add gồm form (input name,email)
    }
    public function add(CoursRequest $request){
        $title = "Thêm mới khóa học";
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            // nếu như tồn tại file thì sẽ upfile lên
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile('hinh',$request->file('image'));
            }
            $student = Cours::create($params);

            if($student->id){
                Session::flash('success','Thêm mới thành công khóa học');
                return redirect()->route('route_cours_add');
            }
        }
        return view('admin.cours.add', compact('title'));
    }

    public function  edit(CoursRequest $request,$id) {
        $title = "Cập nhật khóa học";
        $cours = Cours::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
              $resultDL = Storage::delete('/public/'.$cours->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('hinh',$request->file('image'));
              }
            } else {
                $params['image'] = $cours->image;
            }
           $result = Cours::where('id',$id)
               ->update($params);
           if ($result) {
               Session::flash('success','sửa  thành công khóa học');
               return redirect()->route('route_cours_edit',['id'=>$id]);
           }
        }
        return view('admin.cours.edit',compact('cours','title','id'));
    }

    public function delete($id){
        Cours::where('id',$id)->delete();
        Session::flash('success','xóa thành công khóa học có id là'.$id);
        return redirect()->route('route_cours_index');
    }
}
