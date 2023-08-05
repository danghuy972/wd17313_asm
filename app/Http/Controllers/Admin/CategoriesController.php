<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index(){
        $title = 'Quản lý danh mục';
        $categories = DB::table('categories')->get();
        return view('admin.category.index', compact('title','categories'));
    }

    public function add(CategoryRequest $request){
        $title = "Thêm mới danh mục";
        $params = $request->except('_token');
        if ($request->isMethod('POST')) { //tồn tại phương thức post
            // nếu như tồn tại file thì sẽ upfile lên
            $categories = Categories::create($params);

            if($categories->id){
                Session::flash('success','Thêm mới thành công sinh viên');
                return redirect()->route('route_categories_add');
            }
        }
        return view('admin.category.add', compact('title'));
    }

    public function  edit(CategoryRequest $request,$id) {
        $title = "Cập nhật danh mục";
        //cách 1
//        $student = DB::table('students')
//            ->where('id',$id)->first();
        //cách 2
        $category = Categories::find($id);
        if ($request->isMethod('POST')) {
           $params = $request->except('_token');
           $result = Categories::where('id',$id)
               ->update($request->except('_token'));
           if ($result) {
               Session::flash('success','sửa  thành công danh mục');
               return redirect()->route('route_categories_edit',['id'=>$id]);
           }
        }
        return view('admin.category.edit',compact('title','category'));
    }
    
    public function delete($id){
        Categories::where('id',$id)->delete();
        Session::flash('success','xóa thành công danh mục có id là'.$id);
        return redirect()->route('route_categories_index');
    }
}
