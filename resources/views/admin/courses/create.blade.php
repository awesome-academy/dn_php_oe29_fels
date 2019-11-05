@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.add_course')
                    </div>
                    <div class="card-body">
                        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    @csrf
                                    <div class="form-group">
                                        <label> @lang('messages.title') <span class="alert-required">*</span></label>
                                        <input id="name" type="text" class="form-control" name="title" value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label> @lang('messages.description') </label>
                                        <textarea name="description" cols="{{ config('constants.textarea.course.col') }}" rows="{{ config('constants.textarea.course.row') }}" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> @lang('messages.image') <span class="alert-required">*</span></label>
                                        <input type="file" class="form-control" id="imgInp" name="image_url" value="{{ old('image_url') }}">
                                        <img src="#" alt="" class="mt-4 width-200" id="course-image">
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
