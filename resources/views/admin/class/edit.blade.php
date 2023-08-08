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
    <h1>Cập nhật lớp học</h1>
    <form action="{{ route('route_classes_edit',['id'=>$classes->id]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Tên lớp học</label>
            <input type="text" name="name" value="{{ $classes->name }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Địa điểm</label>
            <input type="text" name="location" value="{{ $classes->location }}" class="form-control">
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Khóa học *</label>
                <select id="course_id" name="course_id" value="{{ $classes->course_id }}" class="selectpicker form-control" data-style="py-0">
                    <option value="">--- Chọn ---</option>
                    @foreach ($course as $co)
                        @if ($classes->course_id == $co->id)
                            <option value="{{ $co->id }}" selected>{{ $co->name }}</option>
                        @endif
                        @if ($classes->course_id != $co->id)
                            <option value="{{ $co->id }}">{{ $co->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Giảng viên *</label>
                <select id="instructor_id" name="instructor_id" value="{{ $classes->instructor_id }}" class="selectpicker form-control" data-style="py-0">
                    <option value="">--- Chọn ---</option>
                    @foreach ($instructors as $in)
                        @if ($classes->instructor_id == $in->id)
                            <option value="{{ $in->id }}" selected>{{ $in->name }}</option>
                        @endif
                        @if ($classes->instructor_id != $in->id)
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