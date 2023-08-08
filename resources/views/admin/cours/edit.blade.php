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
    <form action="{{ route('route_cours_edit',['id'=>$cours->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
            <input type="text" name="name" value="{{ $cours->name }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mô tả</label>
            <input type="text" name="description" value="{{ $cours->description }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="col-md-3 col-sm-4 control-label">Ảnh sản phẩm</label>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    <div class="col-xs-6">
                        <img id="mat_truoc_preview" src="{{ $cours->image?''.Storage::url($cours->image):''}}" alt="your image"
                             style="max-width: 200px; height:100px; margin-bottom: 10px;" class="img-fluid"/>
                        <input type="file" name="image" accept="image/*"
                               class="form-control-file @error('image') is-invalid @enderror" id="cmt_truoc">
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Giá</label>
            <input type="text" value="{{ $cours->price }}" name="price" class="form-control">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Categories *</label>
                <select id="category_id" name="category_id" value="{{ $cours->category_id }}" class="selectpicker form-control" data-style="py-0">
                    <option value="">--- Chọn ---</option>
                    @foreach ($categories as $ca)
                        @if ($cours->category_id == $ca->id)
                            <option value="{{ $ca->id }}" selected>{{ $ca->name }}</option>
                        @endif
                        @if ($cours->category_id != $ca->id)
                            <option value="{{ $ca->id }}">{{ $ca->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Instructors *</label>
                <select id="instructor_id" name="instructor_id" value="{{ $cours->instructor_id }}" class="selectpicker form-control" data-style="py-0">
                    <option value="">--- Chọn ---</option>
                    @foreach ($instructors as $in)
                        @if ($cours->instructor_id == $in->id)
                            <option value="{{ $in->id }}" selected>{{ $in->name }}</option>
                        @endif
                        @if ($cours->instructor_id != $in->id)
                            <option value="{{ $in->id }}">{{ $in->name }}</option>
                        @endif
                    @endforeach
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