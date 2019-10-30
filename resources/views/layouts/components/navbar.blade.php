<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">
        <i class="fas fa-graduation-cap"></i>
        E-LEARNING
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto float-right">
            @guest
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="{{route('register')}}">
                        <i class="fa fa-user-plus"></i>
                        @lang('messages.signup')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-uppercase" href="{{route('login')}}">
                        <i class="fas fa-sign-in-alt"></i>
                        @lang('messages.signin')
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="#"> @lang('messages.word_list') </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> @lang('messages.member') </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @lang('messages.my_account')
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"> @lang('messages.profile') </a>
                        <a class="dropdown-item" href="#"> @lang('messages.setting') </a>
                        <a class="dropdown-item" href="#"> @lang('messages.change_password')</a>
                        <div class="dropdown-divider"> @lang('messages.logout') </div>
                        <a class="dropdown-item" id="logout" data-csrf="{{csrf_token()}}">
                            Logout
                        </a>
                    </div>
                </li>
            @endguest
        </ul>
        <div class="pr-5">
            <a href="#" class="pr-2">
                <img src="{{asset('images/vn.png')}}" width="40" alt="">
            </a>
            <a href="#">
                <img src="{{asset('images/us.png')}}" width="40" alt="">
            </a>
        </div>
    </div>
</nav>
