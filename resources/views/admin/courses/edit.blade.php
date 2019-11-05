@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.edit_course')
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{ $err }}
                                @endforeach
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> @lang('title') <span class="alert-required">*</span></label>
                                        <input id="name" type="text" class="form-control" name="title" value="{{ old('title') ?? $course->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label> @lang('description') </label>
                                        <textarea name="description" class="form-control">{{ old('description') ?? $course->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> @lang('messages.image') </label>
                                        <input type="file" class="form-control" id="imgInp" name="image_url" value="{{ old('image_url') ?? $course->image_url }}">
                                        <img src="{{ asset("storage/upload/courses/$course->image_url") }}" class="mt-4 width-200" id="course-image">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-success">
                                        @lang('messages.save_button')
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
