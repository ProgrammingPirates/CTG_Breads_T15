<div class="page-header sticky-header d-flex align-items-center">
    <div class="container-xl d-flex">

        <nav class="navbar content w-100 m-auto navbar-light navbar-expand-xl">
            <a class="navbar-brand order-xl-1 order-2" href="{{ url('/') }}">
                <img src="{{ url('images/upload/'.$setting->company_logo)}}" width="160px" height = "25px" alt="">
            </a>

            <button class="navbar-toggler  order-xl-2 order-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-start order-xl-2 order-1 " tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">{{ $setting->business_name }}</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav menubar  align-items-xl-center flex-grow-1">
                        <li class="nav-item nav-select {{ $active_page == 'doctors' ? 'active' : '' }}">
                            <a class="nav-link menu-link d-flex flex-column" href="{{ url('show-doctors') }}">{{ __('Counsellor Chat') }}
                                <span>{{ __('Meeting with Counsellor') }}</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>           
            <div class="d-flex align-items-center login avtar-wrapper order-xl-3 order-4 dropdown ms-auto">
                
                @if (auth()->check())
                    <a class="nav-link menu-link drop-link dropdown-toggle more-drop" href="javascript:void(0)" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <img src="{{ url('images/upload/'.auth()->user()->image) }}" class="rounded-circle avtar" alt="">
                    </a>
                    <ul class="dropdown-menu u-d profile-detail" aria-labelledby="offcanvasNavbarDropdown">
                        <li class="dropdown-item d-flex align-items-center">
                            <img src="{{ url('images/upload/'.auth()->user()->image) }}" class="rounded-circle avtar me-2" alt="">
                            <div>
                                <p>{{ auth()->user()->name }}</p>
                                <p class="text-muted">{{ __('Student') }}</p>
                            </div>
                        </li>
                        <li><a class="dropdown-item " href="{{ url('user_profile') }}">{{ __('Dashboard') }}</a>
                        </li>
                        <li><a class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="javascript:void(0)">{{ __('logout') }}</a></li>
                    </ul>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <ul class="navbar-nav menubar  align-items-xl-center flex-grow-1 ">
                        <li class="nav-item dropdown ms-xl-auto">
                            <a class="nav-link drop-link menu-link dropdown-toggle more-drop" href="javascript:void(0)" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('For Providers') }}</a>
                            <ul class="dropdown-menu u-d" aria-labelledby="offcanvasNavbarDropdown">
                                <li><a class="dropdown-item" target="_blank" href="{{ url('doctor/doctor_login') }}">{{ __('Login For Counsellor') }}</a></li>
                                <li><a class="dropdown-item" href="{{ url('patient-login') }}">{{ __('Login For Student') }}</a></li>
                            </ul>
                        </li>
                    </ul>
                @endif
              
               
            </div>
        </nav>
    </div>
</div>