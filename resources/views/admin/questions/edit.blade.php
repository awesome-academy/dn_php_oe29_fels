@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.edit_question')
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    <p>{{ $err }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('questions.update', $question->id )}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>@lang('content') <span class="alert-required">*</span></label>
                                        <input id="name" type="text" class="form-control" name="content" value="{{ $question->content }}">
                                    </div>
                                    <div class="form-group">
                                        @include('admin.shared.lesson-select', ['lessonId' => $question->lesson_id])
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
