@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <h2 class="text-center mt-3 text-white"><strong> @lang('messages.lesson') </strong></h2>
        <div class="border-bottom p-6"></div>
    </div>
    <div class="container">
        <div class="row mt-3">
            @foreach ($lessons as $lesson)
                <div class="col-md-6">
                    <div class="card mb-4 list-lesson">
                        <div class="card-body">
                            <h4 class="card-title">{{ $lesson->title }}</h4>
                            <div class="card-subtitle mb-2 text-muted">
                                Learned {{ $lesson->choices->count() }} of {{ $lesson->questions->count() }}
                            </div>
                            @if ($lesson->user_lessons->count() > config('constants.zero') && $lesson->user_lessons[0]->status == config('constants.lesson_status.done'))
                                <a class="btn btn-secondary float-right mt-4 mb-2 show-result"
                                   href="{{ route('lessons.get-result', $lesson->id) }}">
                                    <i class="fas fa-eye"></i> @lang('messages.show_results')
                                </a>
                            @else
                                <form action="{{ route('user-lessons.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">
                                    <button type="submit" class="btn btn-warning text-white float-right mt-4 start-lesson">
                                        <i class="fas fa-book"></i> @lang('messages.start_lesson')
                                    </button>
                                </form>
                            @endif
                            <a class="btn btn-success text-white float-right mt-4 mr-1 word-list" href="{{ route('lessons.get-words', $lesson->id) }}">
                                <i class="far fa-list-alt"></i> @lang('messages.word_list')
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
