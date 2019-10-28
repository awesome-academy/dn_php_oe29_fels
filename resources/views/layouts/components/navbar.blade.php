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
                    <a class="nav-link" href="{{route('register')}}">
                        <i class="fa fa-user-plus"></i>
                        SIGN UP
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">
                        <i class="fas fa-sign-in-alt"></i>
                        LOGIN
                    </a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="#">Word List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Members</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Setting</a>
                        <a class="dropdown-item" href="#">Change Password</a>
                        <div class="dropdown-divider">Logout</div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
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
