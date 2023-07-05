<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <!--Logo admin website -->
          <a class="navbar-brand brand-logo" href="dashboard" style="font-weight: bold;">
          <i class="mdi mdi-map-marker">GoTravel</i></a>
          <a class="navbar-brand brand-logo-mini" href="dashboard">
          <i class="mdi mdi-map-marker-radius"></i></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Tìm kiếm....">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-img">
                  @if(Auth::check() && Auth::user()->avatar)
                      <img src="../../storage/{{Auth::user()->avatar}}" alt="profile">
                  @endif
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                  <p class="mb-1 text-black">
                    @auth()
                      {{Auth::user()->name}}
                    @endauth()
                  </p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" id="logout-btn" href="{{ route('users.edit',['user' => Auth::user()]) }}">
                  <i class="mdi mdi-information-outline me-2 text-primary"></i> Thông tin tài khoản </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                {{-- href="#" onclick="confirmLogout()" --}}
                <a class="dropdown-item" style="padding: 0.25rem 1rem;">
                  <i class="mdi mdi-logout me-2 text-primary"></i>
                  <input class="dropdown-item" id="logout-btn" type="submit" value="Đăng xuất">
                </a>
              </form>
                
              </div>
            </li>
            
                
          </ul>
        </div>
    </nav>