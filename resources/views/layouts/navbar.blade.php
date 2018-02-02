<!-- Top Bar Start -->
<div class="topbar">
    <!-- LOGO -->
    <div class="topbar-left">
        <a href="{{ URL::route('principal') }}" class="logo">
            <i class="zmdi zmdi-group-work icon-c-logo"></i>
            <span>SIAHO</span>
        </a>
    </div>
    <nav class="navbar navbar-custom">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="zmdi zmdi-menu"></i>
                </button>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right">
            {{--
            <li class="nav-item dropdown notification-list">
                <a class="nav-link waves-effect waves-light right-bar-toggle" href="javascript:void(0);">
                    <i class="zmdi zmdi-format-subject noti-icon"></i>
                </a>
            </li>
            --}}
            <li class="nav-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    @if(Auth::user()->path == '')
                    <img src="{{ asset('uploads/usuarios/unfile.jpg') }}" alt="user" class="img-circle" name="fotoNavbar" id="fotoNavbar">
                    @else
                    <img src="{{ asset('uploads/usuarios/'.Auth::user()->path) }}" alt="user" class="img-circle" name="fotoNavbar" id="fotoNavbar">
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-arrow profile-dropdown " aria-labelledby="Preview">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow"><small>Bienvenido ! {!! Auth::user()->name !!}</small> </h5>
                    </div>
                    {{--
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                    </a>
                    --}}
                    <!-- item-->
                    <a href="{{ URL::route('logout') }}" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-power"></i> <span>Salir</span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
</div>
<!-- Top Bar End -->