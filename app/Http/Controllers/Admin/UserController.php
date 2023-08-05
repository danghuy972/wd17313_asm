<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index() {
        $title = "Tài khoản";
        $users = User::all();
        return view('admin.user.index',compact('title','users'));
        //tạo 1 route add-student và view add gồm form (input name,email)
    }
    
    public function add(UserRequest $request){
        $title = "Thêm mới tài khoản";
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            // nếu như tồn tại file thì sẽ upfile lên
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                $params['image'] = uploadFile('hinh',$request->file('image'));
            }
            $student = User::create($params);

            if($student->id){
                Session::flash('success','Thêm mới thành công sinh viên');
                return redirect()->route('route_user_add');
            }
        }
        return view('admin.user.add', compact('title'));
    }

    public function  edit(UserRequest $request,$id) {
        $title = "Cập nhật người dùng";
        //cách 1
//        $student = DB::table('students')
//            ->where('id',$id)->first();
        //cách 2
        $users = User::find($id);
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            //
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                //có file mới upload lên sẽ link vào để xóa ảnh cũ đi
              $resultDL = Storage::delete('/public/'.$users->image);
              if ($resultDL) {
                  $params['image'] = uploadFile('hinh',$request->file('image'));
              }
            } else {
                $params['image'] = $users->image;
            }
           $result = User::where('id',$id)
               ->update($request->except('_token'));
           if ($result) {
               Session::flash('success','sửa  thành công sinh viên');
               return redirect()->route('route_user_edit',['id'=>$id]);
           }
        }
        return view('admin.user.edit',compact('users','title','id'));
    }

    public function delete($id){
        User::where('id',$id)->delete();
        Session::flash('success','xóa thành công tài khoản có id là'.$id);
        return redirect()->route('route_user_index');
    }
}
