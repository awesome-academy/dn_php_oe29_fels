@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2 class="text-white text-center border-bottom pb-2">COURSES</h2>
            </div>
        </div>
        <div class="row pt-2">
            <div class="col-md-4">
                <div class="card course">
                    <a href="#">
                        <img class="card-img-top" src="{{asset('images/slide1_2.png')}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title">Card title</h5>
                        </a>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                            to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card course">
                    <a href="#">
                        <img class="card-img-top" src="{{asset('images/slide1_2.png')}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title">Card title</h5>
                        </a>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional
                            content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card course">
                    <a href="#">
                        <img class="card-img-top" src="{{asset('images/slide1_2.png')}}" alt="Card image cap">
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title">Card title</h5>
                        </a>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
