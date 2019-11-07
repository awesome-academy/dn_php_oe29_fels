@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header">@lang('messages.list_question')</h5>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">@lang('messages.stt')</th>
                                <th scope="col">@lang('messages.question')</th>
                                <th scope="col">@lang('messages.answer_correct')</th>
                                <th scope="col">@lang('messages.lesson')</th>
                                <th scope="col">@lang('messages.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($questions as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->content }}</td>
                                    <td>{{ $value->answers_correct[0]->content ?? '' }}</td>
                                    <td>{{ $value->lesson->title }}</td>
                                    <td>
                                        <a href="{{ route('questions.edit',$value->id) }}" class="btn btn-warning btn-sm text-light float-left mr-1">
                                            @lang('messages.edit')
                                        </a>
                                        <form action="{{ route('questions.destroy',$value->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">@lang('messages.delete')</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="col-lg-12 mt-2">
                            {!! $questions->links() !!}
                        </div>
                        <div class="card-footer bg-light">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
