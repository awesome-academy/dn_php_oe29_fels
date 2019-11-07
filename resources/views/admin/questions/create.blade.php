@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.add_question')
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    <p>{{ $err }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('questions.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('messages.content')<span class="alert-required">*</span></label>
                                        <input id="name" type="text" class="form-control" name="content" value="{{ old('content') }}">
                                    </div>
                                    <div class="form-group">
                                        @include('admin.shared.lesson-select', ['lessons' => $lessons])
                                    </div>
                                    <div id="option">
                                        <div class="form-group row">
                                            <label class="col-lg-2"> @lang('messages.correct') </label>
                                            <label class="col-lg-7 mr-1"> @lang('messages.option_answer') </label>
                                            <span class="btn btn-outline-primary mr-1" id="add-option" title="@lang('messages.title_button_add_option')">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </div>
                                        <div class="form-group row option-answer">
                                            <input type="radio" class="form-control col-lg-2 float-left"
                                                   name="correct" value="{{ config('constants.zero') }}">
                                            <input type="text" class="form-control col-lg-8 mr-1"
                                                   name="option_answer[]" value="{{ old('option_answer.0') }}">
                                            <span class="btn btn-outline-danger remove-option"><i class="fas fa-minus"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">@lang('messages.save_button')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.questions.script')
@endsection
