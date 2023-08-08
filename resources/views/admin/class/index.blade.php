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
    <h1>Danh sách lớp học</h1>
    <a href="{{ route('route_classes_add')}}" class="btn btn-primary my-3">Thêm mới lớp học</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Địa điểm</th>
                <th scope="col">Khóa học</th>
                <th scope="col">Giảng viên</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $cla)
            <tr>
                <th scope="row">{{ $cla->id }}</th>
                <td>{{ $cla->name }}</td>
                <td>{{ $cla->location }}</td>
                <td>{{ $cla->course->name }}</td>
                <td>{{ $cla->instructor->name}}</td>
                <td>
                    <a href="{{ route('route_classes_edit',['id'=>$cla->id]) }}" class="btn btn-success">Cập nhật</a>
                    <a href="{{ route('route_classes_delete',['id'=>$cla->id]) }}" class="btn btn-danger">Xóa</a>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection