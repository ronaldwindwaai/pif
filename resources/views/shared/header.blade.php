<!-- [ Header ] start -->
<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="/" class="b-brand">
            <img src="{{asset('assets/images/logo-dark.png')}}" alt="" class="logo" height="60px">
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
                <div class="search-bar">
                    <input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                            class="icon feather icon-bell"></i></a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                            <div class="float-right">
                                <a href="#!" class="m-r-10">mark as read</a>
                                <a href="#!">clear all</a>
                            </div>
                        </div>
                        @isset($notifications)
                            <ul class="noti-body">
                                @forelse ($notifications as $notification)
                                    <li class="n-title">
                                    <p class="m-b-0">{{ $notification->name }}</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{asset('assets/images/user/profile-picture.png')}}"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>{{ $notification->data['name'] }}</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>{{ $notification->created_at->diffForHumans() }}</span></p>
                                            <p>User was recently added..</p>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                    <li class="n-title">
                                    <p class="m-b-0">All Notifications have been read</p>
                                </li>
                                @endforelse
                                <div class="noti-footer">
                                <a href="#!">show all</a>
                                </div>
                            </ul>
                        @endisset
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">

                        <div class="pro-head">
										<img src="{{asset('assets/images/user/profile-picture.png')}}" class="img-radius" alt="User-Profile-Image">
										<span>{{ ucwords(Auth::user()->name) }}</span>
										<form id="logout_form" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" onclick="document.getElementById('logout_form').submit();" data-toggle="tooltip" title="Logout" class="text-danger">
                                    <i class="feather icon-log-out"></i></a>
                            </form>
									</div>
                        <ul class="pro-body">
                            <li><a href="{{ route('users.show',Auth::user()->id) }}" class="dropdown-item"><i class="feather icon-user"></i>
                                    Profile</a></li>
                            <li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My
                                    Messages</a></li>
                            <li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock
                                    Screen</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
<!-- [ Header ] end -->
