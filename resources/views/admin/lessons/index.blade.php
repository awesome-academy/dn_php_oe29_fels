@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header"> @lang('messages.list_lesson') </h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
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
                            </div>
                            <div class="col-lg-4">
                                <a href="{{ route('lessons.create') }}" class="btn btn-primary float-right mb-1"> @lang('messages.add_new') </a>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> @lang('messages.stt') </th>
                                    <th scope="col"> @lang('messages.title') </th>
                                    <th scope="col"> @lang('messages.course') </th>
                                    <th scope="col"> @lang('messages.action') </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($lessons as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ $value->course->title ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('lessons.edit',$value->id) }}" class="btn btn-warning btn-sm text-light float-left mr-1"> @lang('messages.edit') </a>
                                        <form action="{{ route('lessons.destroy', $value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"> @lang('messages.delete') </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-lg-12 mt-2">
                            {!! $lessons->links() !!}
                        </div>
                        <div class="card-footer bg-light">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
