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
    <h1>Danh sách giảng viên</h1>
    <a href="{{ route('route_instructors_add') }}" class="btn btn-primary my-3">Thêm mới giảng viên</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Tiểu sử</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instructors as $i)
            <tr>
                <th scope="row">{{ $i->id }}</th>
                <td>{{ $i->name }}</td>
                <td>{{ $i->email }}</td>
                <td>{{ $i->phone }}</td>
                <td><img src="{{ $i->image?''.Storage::url($i->image):''}}" style="width: 120px" /></td>
                <td>{{ $i->bio}}</td>
                <td>
                    <a href="{{ route('route_instructors_edit',['id'=>$i->id]) }}" class="btn btn-success">Cập nhật</a>
                    <a href="{{ route('route_instructors_delete',['id'=>$i->id]) }}" class="btn btn-danger">Xóa</a>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection