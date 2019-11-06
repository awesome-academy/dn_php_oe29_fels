@php
    $lessonId = $lessonId ?? old('lesson_id');
@endphp

<label> @lang('messages.lesson') <span class="alert-required">*</span></label>
<select name="lesson_id" id="" class="form-control">
    <option value=""> @lang('messages.choose_lesson') </option>
    @foreach($lessons as $key => $value)
        <option class="form-control" value="{{ $value->id }}" @if ($value->id == $lessonId) selected="selected" @endif >
            {{ $value->title }}
        </option>
    @endforeach
</select>
