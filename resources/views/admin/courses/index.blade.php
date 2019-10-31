@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header"> @lang('messages.list_course') </h5>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> @lang('messages.stt') </th>
                                    <th scope="col"> @lang('messages.title') </th>
                                    <th scope="col"> @lang('messages.image') </th>
                                    <th scope="col"> @lang('messages.action') </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($courses as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>
                                        <img src="{{ asset("storage/upload/courses/$value->image_url") }}" class="width-50">
                                    </td>
                                    <td>
                                        <a href="{{ route('courses.edit',$value->id) }}"
                                           class="btn btn-warning btn-sm text-light float-left mr-1"> @lang('messages.edit') </a>
                                        <form action="{{ route('courses.destroy',$value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                @lang('messages.delete')
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $courses->links() !!}
                        <div class="card-footer bg-light">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
