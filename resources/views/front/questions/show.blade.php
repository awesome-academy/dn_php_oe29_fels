@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <div class="row">
            <div class="col-lg-4 offset-lg-3">
                <h3 class="text-white">{{ $question->lesson->title }}</h3>
                <h5 class="text-white">{{ $total - $progress + 1 }} of {{ $total }}</h5>
                <div class="card show-question">
                    <div class="card-body">
                        <h1 class="card-title text-center"><strong>{{ $question->content }}</strong></h1>
                        <br>
                        @foreach ($question->answer_options as $key => $value)
                            <form action="{{ route('choices.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <div><input type="hidden" name="lesson_id" value="{{ $question->lesson_id }}"></div>
                                    <div><input type="hidden" name="question_id" value="{{ $question->id }}"></div>
                                    <div><input type="hidden" name="answer_option_id" value="{{ $value->id }}"></div>
                                    <input type="submit" value="{{ $value->content }}" class="btn btn-outline-warning btn-lg btn-block">
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
