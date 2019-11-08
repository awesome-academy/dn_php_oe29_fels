@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3 pt-5">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.edit_profile')
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    <p>{{ $err }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('profiles.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="text-center">
                                <img class="br-max pic-list" src="{{ asset("storage/upload/users/$user->avatar") }}">
                            </div>
                            <div class="form-group">
                                <label for="">@lang('messages.avatar')</label>
                                <input type="file" name="avatar" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>@lang('messages.name')</label>
                                <input class="form-control" type="text" value="{{ $user->name }}" name="name">
                            </div>
                            <div class="form-group">
                                <label>@lang('messages.email')</label>
                                <input class="form-control" type="email" value="{{ $user->email }}" name="email">
                            </div>
                            <input type="submit" class="btn btn-warning btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
