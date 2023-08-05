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
    <h1>Danh sách tài khoản</h1>
    <a href="{{ route('route_user_add')}}" class="btn btn-primary my-3">Thêm mới tài khoản</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Vai trò</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <th scope="row">{{ $u->id }}</th>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td><img src="{{ $u->image?''.Storage::url($u->image):''}}" style="width: 150px" /></td>
                <td>{{ $u->phone }}</td>
                <td>{{ $u->dress }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    <a href="{{ route('route_user_edit',['id'=>$u->id]) }}" class="btn btn-success">Cập nhật</a>
                    <a href="{{ route('route_user_delete',['id'=>$u->id]) }}" class="btn btn-danger">Xóa</a>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection