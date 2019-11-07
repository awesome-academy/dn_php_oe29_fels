@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-6 offset-lg-2">
                <div class="card list-word">
                    <div class="card-header">
                        <h3 class="float-left">{{ $lesson->title }}</h3>
                        <a href="{{ route('lessons.list-by-course', $lesson->course_id) }}" class="btn btn-secondary float-right">@lang('messages.back')</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"> @lang('messages.word') </th>
                                <th scope="col"> @lang('messages.correct_answer')</th>
                                <th scope="col"> @lang('messages.answer')</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($questions as $key => $value)
                            <tr>
                                <td>{{ $value->content }}</td>
                                <td>{{ $value->answer_options[0]->content ?? '' }}</td>
                                <td>{{ $value->choices[0]->answer_option->content ?? '' }}</td>
                                <td>
                                    @if ($value->answer_options[0]->is_correct == $value->choices[0]->answer_option->is_correct)
                                        <div><i class="fas fa-check"></i></div>
                                    @else
                                        <div><i class="fas fa-times"></i></div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
