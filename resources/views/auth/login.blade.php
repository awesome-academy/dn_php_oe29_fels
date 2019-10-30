@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-6 offset-lg-3 mt-5">
                <div class="card">
                    <div class="card-header text-uppercase">
                        @lang('messages.login')
                    </div>
                    <div class="card-body">
                        <form action="{{route('login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label> @lang('messages.email_label') </label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label> @lang('messages.password_label') </label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-warning text-white">
                                @lang('messages.login')
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
