<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> 
                    <span>
                        <img alt="image" class="img-circle" src="/img/default-user-img.png">
                    </span>
                    <span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                <strong class="font-bold">
                                    @if( Auth::check() )
                                        {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                    @endif
                                </strong>
                                </span>
                                <span class="text-muted text-xs block">    @if( Auth::check() )
                                        {{ Auth::user()->role }}
                                    @endif
                                <b class="caret"></b></span>
                            </span>
                        </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                @if( Auth::check() )
                                    <li><a href="/myprofile/{{ Auth::user()->id }}">Profile</a></li>
                                @endif
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                    </div>
                    <div class="logo-element">
                        TM+
                    </div>
                </li>
                <li class="{{ (str_contains(Request::path(), 'dashboard') || str_contains(Request::path(), 'home') || Request::path() == '/') ? 'active' : ''  }}">
                    <a href="/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                @if(Auth::user()->role != 'Test Participant')
                <li class="{{ str_contains(Request::path(),  'templates') ? 'active' : ''  }}">
                    <a href="/templates"><i class="fa fa-book"></i> <span class="nav-label">Test Templates</span></a>
                </li>
                @endcan
                
                <li class="{{ str_contains(Request::path(), 'projects') ? 'active' : ''  }}">
                    <a href="/projects"><i class="fa fa-folder"></i> <span class="nav-label">Test Projects</span> </a>
                </li>
                
                @if(Auth::user()->role != 'Test Participant')

                <li class="{{ str_contains(Request::path(), 'users') ? 'active' : ''  }}">
                    <a href="/users"><i class="fa fa-users"></i> <span class="nav-label">Test Users</span> </a>
                </li>

                <li class="{{ str_contains(Request::path(), 'reports') ? 'active' : ''  }}">
                    <a href="/reports"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Test Reports</span> </a>
                </li>

                @endif
            </ul>

        </div>
    </nav>