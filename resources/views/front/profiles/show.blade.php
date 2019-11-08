@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card mb-6">
                    <div class="card-body text-center">
                        <img class="pic-list" src="{{ asset("storage/upload/users/$user->avatar")}}">
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->email }}</p>
                        <hr>
                        <div class="d-inline mr-4">@lang('messages.following')</div>
                        <div class="d-inline ml-3">@lang('messages.follower')</div>
                        <div>
                            <strong id="following">
                                <a class="mr-5 text-warning" href="#">{{ $user->followings->count() }}</a>
                            </strong>

                            <strong id="followers">
                                <a class="ml-5 text-warning" href="#">{{ $user->followers->count() }}</a>
                            </strong>
                        </div>
                        <hr>
                        @lang('messages.learned_words')
                        <div>
                            <strong>
                                <a class="text-warning" href="{{ route('words.index', ['status' => config('constants.learning_status.learned')]) }}">
                                    {{ $totalLearned }}
                                </a>
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <h5 class="card-header">@lang('messages.activity')</h5>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            @foreach ($activities as $key => $value)
                                <li class="media mb-4">
                                    <div class="media-body">
                                        <a class="text-warning" href="#">You</a>
                                        {{ array_search($value->action_type, config('constants.activity_type')) }}
                                        @if ($value->action_type == config('constants.activity_type.followed'))
                                            <a class="text-warning" href="#"> {{ $value->user_action->name }} </a>
                                        @endif
                                        @if ($value->action_type == config('constants.activity_type.learned'))
                                            "{{ $value->question->content }}" word of
                                            <a class="text-warning" href="#">{{ $value->question->lesson->title }}</a>
                                        @endif
                                        <div>
                                            <small class="text-muted">{{ \Carbon\Carbon::now()->diffForHumans($value->created_at) }}</small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="card-footer bg-light">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
