<div class="float-left">
    <div class="sidenav">
        <button class="dropdown-btn">
            @lang('messages.course') <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{ route('courses.create') }}"> @lang('messages.add') </a>
            <a href="{{ route('courses.index') }}"> @lang('messages.list') </a>
        </div>
        <button class="dropdown-btn">
            @lang('messages.lesson') <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="{{ route('lessons.create') }}"> @lang('messages.add') </a>
            <a href="{{ route('lessons.index') }}"> @lang('messages.list') </a>
        </div>
        <button class="dropdown-btn">
            @lang('messages.user') <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
            <a href="#"> @lang('messages.add') </a>
            <a href="#"> @lang('messages.list') </a>
        </div>
    </div>
</div>
