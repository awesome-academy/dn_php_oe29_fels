@php
    $questionId = $questionId ?? old('question_id')
@endphp
<label> @lang('messages.question') <span class="alert-required">*</span></label>
<select name="question_id" id="" class="form-control">
    <option value=""> @lang('messages.question')</option>
    @foreach ($questions as $question)
        <option class="form-control" value="{{ $question->id }}" @if ($questionId == $question->id) selected="selected" @endif >
            {{ $question->content }}
        </option>
    @endforeach
</select>
