@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.add_option_answer')
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    <p>{{ $err }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('option-answers.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> @lang('messages.answer') <span class="alert-required">*</span></label>
                                        <input id="name" type="text" class="form-control" name="content" value="{{ old('content')}}">
                                    </div>
                                    <div class="form-group">
                                        @foreach (config('constants.result') as $key => $value)
                                            <div class="form-check form-check-inline">
                                                <input
                                                    class="form-check-input" type="radio" name="is_correct" id="is-correct" value="{{ $value }}"
                                                    @if (old('is_correct', config('constants.result.incorrect')) == $value) checked="checked" @endif
                                                >
                                                <label class="form-check-label" for="is-correct">
                                                    {{ ucfirst($key) }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        @include('admin.shared.question-select')
                                    </div>
                                    <a href="{{ route('option-answers.index') }}" class="btn btn-secondary"> @lang('messages.back') </a>
                                    <button type="submit" class="btn btn-success">@lang('messages.save_button')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
