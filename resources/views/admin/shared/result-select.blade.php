@php
    $isCorrect = $isCorrect ?? old('is_correct');
@endphp

@foreach ($results as $key => $value)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="is_correct" id="is-correct" value="{{ $value }}" @if ($value == $isCorrect) checked="checked" @endif  >
        <label class="form-check-label" for="is-correct">{{ ucfirst($key) }}</label>
    </div>
@endforeach
