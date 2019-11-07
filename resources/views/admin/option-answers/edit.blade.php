@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        @lang('messages.edit_option_answer')
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    <p>{{ $err }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('option-answers.update', $optionAnswer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label> @lang('messages.answer') <span class="alert-required">*</span></label>
                                        <input id="name" type="text" class="form-control" name="content" value="{{ old('content', $optionAnswer->content) }}">
                                    </div>
                                    <div class="form-group">
                                        @include('admin.shared.result-select', ['results' => config('constants.result'), 'isCorrect' => $optionAnswer->is_correct])
                                    </div>
                                    <div class="form-group">
                                        @include('admin.shared.question-select', ['questionId' => $optionAnswer->question_id])
                                    </div>
                                    <a href="{{ route('option-answers.index') }}" class="btn btn-secondary"> @lang('messages.back')</a>
                                    <button type="submit" class="btn btn-success"> @lang('messages.save_button')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
