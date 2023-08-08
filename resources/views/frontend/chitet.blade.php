@extends('frontend.main-layout')
@section('body')
    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="{{ $courses->image?''.Storage::url($courses->image):'' }}" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">
                        <h1>{{ $courses->name }}</h1>
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Danh mục: {{ $courses->categories->name }} </h5>
                        <p>Giảng viên : {{ $courses->instructors->name }} </p>
                        <h5 class="m-0">{{ $courses->price }}$</h5>
                    </div>
                    <p>{{ $courses->description }}</p>
                    <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Đăng ký khóa học</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


@endsection