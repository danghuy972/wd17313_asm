<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Laravel</title>
</head>
<body>
@extends('admin.main-layout')
@section('body')
    <h1>Cập nhật khóa học</h1>
    <form action="{{ route('route_cours_add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên khóa học</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mô tả</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh Sản phẩm</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="mat_truoc_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Giá</label>
            <input type="text" name="price" class="form-control">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Category *</label>
                <select id="category_id" name="category_id" value="" class="selectpicker form-control" data-style="py-0">
                    <option value="">--- Chọn ---</option>
                        <option value="1">Danh mục 1</option>
                        <option value="2">Danh mục 2</option>
                        <option value="3">Danh mục 3</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Category *</label>
                <select id="instructor_id" name="instructor_id" value="" class="selectpicker form-control" data-style="py-0">
                    <option value="">--- Chọn ---</option>
                        <option value="1">Giảng viên 1</option>
                        <option value="2">Giảng viên 2</option>
                        <option value="3">Giảng viên 3</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
@section('script')
<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_truoc").change(function () {
            readURL(this, '#mat_truoc_preview');
        });

    });
</script>
@endsection