@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header"> @lang('messages.list_option_answer') </h5>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col"> @lang('messages.stt')</th>
                                <th scope="col"> @lang('messages.question')</th>
                                <th scope="col"> @lang('messages.answer')</th>
                                <th scope="col"> @lang('messages.status_correct')</th>
                                <th scope="col"> @lang('messages.action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($optionAnswers as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->question->content }}</td>
                                    <td>{{ $value->content }}</td>
                                    <td>
                                        @if ($value->is_correct == config('constants.result.correct'))
                                            <span class="text-success">@lang('messages.correct')</span>
                                        @else
                                            <span class="text-danger">@lang('messages.incorrect')</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('option-answers.edit',$value->id) }}" class="btn btn-warning btn-sm text-light float-left mr-1">@lang('messages.edit')</a>
                                        <form action="{{ route('option-answers.destroy',$value->id) }}" method="POST">
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
                            {!! $optionAnswers->links() !!}
                        </div>
                        <div class="card-footer bg-light">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
