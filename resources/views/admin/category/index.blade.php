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
    <h1>Danh sách danh mục</h1>
    <a href="{{ route('route_categories_add')}}" class="btn btn-primary my-3">Thêm mới danh mục</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên</th>
                <th scope="col">Chức năng</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
            <tr>
                <th scope="row">{{ $c->id }}</th>
                <td>{{ $c->name }}</td>
                <td>
                    <a href="{{ route('route_categories_edit',['id'=>$c->id]) }}" class="btn btn-success">Cập nhật</a>
                    <a href="{{ route('route_categories_delete',['id'=>$c->id]) }}" class="btn btn-danger">Xóa</a>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection