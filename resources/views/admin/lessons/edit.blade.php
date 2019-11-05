@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.edit_lesson')
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    <p>{{ $err }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> @lang('messages.title') <span class="alert-required">*</span></label>
                                        <input id="name" type="text" class="form-control" name="title" value="{{ old('title', $lesson->title)}}">
                                    </div>
                                    <div class="form-group">
                                        <label> @lang('messages.course') <span class="alert-required">*</span></label>
                                        <select name="course_id" id="" class="form-control">
                                            @foreach ($courses as $course)
                                                <option class="form-control" value="{{ $course->id }}"
                                                    {{ old('course_id', $lesson->course_id) == $course->id ? 'selected' : '' }}>
                                                    {{ $course->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <a class="btn btn-secondary" href="{{ route('lessons.index') }}"> @lang('messages.back') </a>
                                    <button type="submit" class="btn btn-success"> @lang('messages.save_button') </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
