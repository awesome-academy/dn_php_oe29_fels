@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 class="text-white text-center border-bottom pb-2">COURSES</h2>
            </div>
        </div>
        <div class="row pt-2">
            @foreach ($courses as $key => $value)
                <div class="col-md-3 mb-2">
                    <div class="card course">
                        <a href="#">
                            <div class="wrap-img">
                                <img class="card-img-top" src="{{ asset("storage/upload/courses/$value->image_url") }}">
                            </div>
                        </a>
                        <div class="card-body">
                            <a href="#">
                                <h5 class="card-title">{{ $value->title }}</h5>
                            </a>
                            <p class="card-text"> {{ $value->description }} </p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 mt-3">
                {!! $courses->links() !!}
            </div>
        </div>
    </div>
@endsection
