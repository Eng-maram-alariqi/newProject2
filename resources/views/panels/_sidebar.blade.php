<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{route('dashboard.view')}}">
                        <svg
                            width="26px"
                            height="26px"
                            viewBox="0 0 26 26"
                            version="1.1"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>icon</title>
                            <defs>
                                <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="linearGradient-1">
                                    <stop stop-color="#5A8DEE" offset="0%"></stop>
                                    <stop stop-color="#699AF9" offset="100%"></stop>
                                </linearGradient>
                                <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-2">
                                    <stop stop-color="#FDAC41" offset="0%"></stop>
                                    <stop stop-color="#E38100" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <g id="Pages" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Login---V2" transform="translate(-667.000000, -290.000000)">
                                    <g id="Login" transform="translate(519.000000, 244.000000)">
                                        <g id="Logo" transform="translate(148.000000, 42.000000)">
                                            <g id="icon" transform="translate(0.000000, 4.000000)">
                                                <path
                                                    d="M13.8863636,4.72727273 C18.9447899,4.72727273 23.0454545,8.82793741 23.0454545,13.8863636 C23.0454545,18.9447899 18.9447899,23.0454545 13.8863636,23.0454545 C8.82793741,23.0454545 4.72727273,18.9447899 4.72727273,13.8863636 C4.72727273,13.5423509 4.74623858,13.2027679 4.78318172,12.8686032 L8.54810407,12.8689442 C8.48567157,13.19852 8.45300462,13.5386269 8.45300462,13.8863636 C8.45300462,16.887125 10.8856023,19.3197227 13.8863636,19.3197227 C16.887125,19.3197227 19.3197227,16.887125 19.3197227,13.8863636 C19.3197227,10.8856023 16.887125,8.45300462 13.8863636,8.45300462 C13.5386269,8.45300462 13.19852,8.48567157 12.8689442,8.54810407 L12.8686032,4.78318172 C13.2027679,4.74623858 13.5423509,4.72727273 13.8863636,4.72727273 Z"
                                                    id="Combined-Shape"
                                                    fill="#4880EA"
                                                ></path>
                                                <path
                                                    d="M13.5909091,1.77272727 C20.4442608,1.77272727 26,7.19618701 26,13.8863636 C26,20.5765403 20.4442608,26 13.5909091,26 C6.73755742,26 1.18181818,20.5765403 1.18181818,13.8863636 C1.18181818,13.540626 1.19665566,13.1982714 1.22574292,12.8598734 L6.30410592,12.859962 C6.25499466,13.1951893 6.22958398,13.5378796 6.22958398,13.8863636 C6.22958398,17.8551125 9.52536149,21.0724191 13.5909091,21.0724191 C17.6564567,21.0724191 20.9522342,17.8551125 20.9522342,13.8863636 C20.9522342,9.91761479 17.6564567,6.70030817 13.5909091,6.70030817 C13.2336969,6.70030817 12.8824272,6.72514561 12.5388136,6.77314791 L12.5392575,1.81561642 C12.8859498,1.78721495 13.2366963,1.77272727 13.5909091,1.77272727 Z"
                                                    id="Combined-Shape2"
                                                    fill="url(#linearGradient-1)"
                                                ></path>
                                                <rect
                                                    id="Rectangle"
                                                    fill="url(#linearGradient-2)"
                                                    x="0"
                                                    y="0"
                                                    width="7.68181818"
                                                    height="7.68181818"
                                                ></rect>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            @if(
                auth()->user()->can('list-users')||
                auth()->user()->can('list-roles') ||
                auth()->user()->can('list-instructors')||
                auth()->user()->can('list-trainees')||
                auth()->user()->can('create-users')||
                auth()->user()->can('create-roles')||
                auth()->user()->can('create-instructors')||
                auth()->user()->can('create-trainees')||
                auth()->user()->can('update-users')||
                auth()->user()->can('update-instructors')||
                auth()->user()->can('update-trainees')||
                auth()->user()->can('update-roles')
           )
                {{-- Dashboard --}}
                <li id="{{(  request()->routeIs('admin.user.edit')
                          || request()->routeIs('admin.role.edit')
                          || request()->routeIs('admin.index')
                          || request()->routeIs('admin.trainee.edit')
                          || request()->routeIs('admin.instructor.edit'))  ? 'edit-link' : ''}}"
                    class="menu mb-2">
                    <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled"
                        id="dashboard"
                        data-bs-parent="#accordionExample">

                        @can('list-users')
                            <li id="{{(request()->routeIs('admin.user.index')) ? 'active-link' : ''}}">
                                <a href="{{route('admin.user.index')}}"> Admins </a>
                            </li>
                        @endcan


                    </ul>
                </li>
            @endif


        </ul>
    </nav>
</div>

