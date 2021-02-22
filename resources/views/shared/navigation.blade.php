<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details">{{ ucwords(Auth::user()->name) }} <i class="fa fa-caret-down"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="user-profile.html" data-toggle="tooltip"
                                title="View Profile"><i class="feather icon-user"></i></a></li>
                        <li class="list-inline-item"><a href="email_inbox.html"><i class="feather icon-mail"
                                    data-toggle="tooltip" title="Messages"></i><small
                                    class="badge badge-pill badge-primary">5</small></a></li>
                        <li class="list-inline-item">
                            <form id="logout" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" onclick="document.getElementById('logout').submit();" data-toggle="tooltip" title="Logout" class="text-danger"><i
                                    class="feather icon-power"></i></a>

                            </form>

                        </li>
                    </ul>
                </div>
            </div>

            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>

                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Programmes</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('programmes.create') }}">Add A Programme</a></li>
                        <li><a href="{{ route('programmes.index') }}">List All Programmes</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layout"></i></span><span class="pcoded-mtext">Project</span></a>
                    <ul class="pcoded-submenu">

                        <li><a href="{{ route('projects.create') }}">Add A Project</a></li>
                        <li><a href="{{ route('projects.index') }}">List All Projects</a></li>

                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Meetings</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('meetings.create') }}">Setup A Meeting</a></li>
                        <li><a href="{{ route('meetings.index') }}">List All Meetings</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-at-sign"></i></span><span class="pcoded-mtext">Recordings</span><span
                            class="pcoded-badge badge badge-success">100+</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('recordings.create') }}">Add A Recordings</a></li>
                        <li><a href="{{ route('recordings.index') }}">List All Recordings</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layers"></i></span><span class="pcoded-mtext">Resources</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('resources.create') }}">Add A Resource</a></li>
                        <li><a href="{{ route('resources.index') }}">List All Resources</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-tablet"></i></span><span class="pcoded-mtext">Participants</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('participants.create') }}">Add A Participants</a></li>
                        <li><a href="{{ route('participants.load') }}">Load Participants</a></li>
                        <li><a href="{{ route('participants.index') }}">List All Participants</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                class="feather icon-users"></i></span><span class="pcoded-mtext">Users</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('users.create') }}">Profile</a></li>
                        <li><a href="{{ route('users.create') }}">Add a User </a></li>
                        <li><a href="{{ route('users.index') }}">List All Users</a></li>
                        <li><a href="{{ route('roles.index') }}">List Roles</a></li>
                    </ul>
                </li>
            </ul>

            <div class="card text-center">
                <div class="card-block">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">Help?</h6>
                    <p>Please contact us on our email for need any support</p>
                    <a href="{{ route('supports.create') }}" target="_blank"
                        class="btn btn-primary btn-sm text-white m-0">Support</a>
                </div>
            </div>

        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
