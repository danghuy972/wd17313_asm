@extends('frontend.main-layout')
@section('body')

    <!-- Category Start -->
    {{-- <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Subjects</h5>
                <h1>Explore Top Subjects</h1>
            </div>
            <div class="row">
                @foreach ($categories as $category) 
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="cat-item position-relative overflow-hidden rounded mb-2">
                        <img class="img-fluid" src="{{ asset('frontend/img/cat-1.jpg') }}" alt="">
                        <a class="cat-overlay text-white text-decoration-none" href="">
                            <h4 class="text-white font-weight-medium">{{ $category->name }}</h4>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <!-- Category Start -->


    <!-- Courses Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Khoá học</h5>
                <h1>Các khóa học phổ biến</h1>
            </div>
            <div class="row">
                @foreach ($courses as $c)                    
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="rounded overflow-hidden mb-2">
                        <img class="img-fluid" src="{{ $c->image?''.Storage::url($c->image):'' }}" alt="">
                        <div class="bg-secondary p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-users text-primary mr-2"></i>{{ $c->instructors->name }}</small>
                                <small class="m-0">{{ $c->categories->name }}</small>
                            </div>
                            <a class="h5" href="{{ route('chitiet',['id'=>$c->id]) }}">{{ $c->name }}</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><i class="fa fa-star text-primary mr-2"></i>4.5 <small>(250)</small></h6>
                                    <h5 class="m-0">{{ $c->price }}$</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses End -->
@endsection