@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 pt-5">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.change_password')
                    </div>
                    <div class="card-body">
                        <div class="alert-success">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('profiles.update_change_password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label> @lang('messages.current_password') </label>
                                <input class="form-control" type="password" name="password" required>
                                @error('password')
                                    <span class="message-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('messages.new_password')</label>
                                <input class="form-control" type="password" name="new_password" required>
                                @error('new_password')
                                    <span class="message-error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>@lang('messages.password_confirm')</label>
                                <input class="form-control" type="password" name="new_password_confirmation" required>
                            </div>
                            <input type="submit" class="btn btn-warning btn-block text-white">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
