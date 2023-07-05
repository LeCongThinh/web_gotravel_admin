<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                {{-- Đảm bảo người dùng đã đăng nhập trước khi truy cập thuộc tính avatar --}}
                <div class="nav-profile-image">
                  @if(Auth::check() && Auth::user()->avatar)
                      <img src="../../storage/{{Auth::user()->avatar}}" alt="profile">
                  @endif
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">
                    @auth()
                      {{Auth::user()->name}}
                    @endauth()
                  
                  </span>
                  <span class="text-secondary text-small">
                    @auth
                      {{ Auth::user()->role == 1 ? 'Admin' : (Auth::user()->role == 0 ? 'Nhân viên' : 'Khách hàng') }}
                    @endauth
                  </span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="dashboard">
                <span class="menu-title" style="font-size: 17px">Trang chủ</span>

                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            {{-- <hr style="width: 80%; height: 2px ; margin: 0 auto; border-top: 1px solid #0000;"> --}}
            <li class="nav-item">
              {{-- href="{{ route('tours.index') }}" --}}
              <a class="nav-link" href="{{ route('tours.index') }}">
                <span class="menu-title" style="font-size: 17px">Quản lý tour</span>
                <i class="mdi mdi-airplane menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('categories.index') }}">
                <span class="menu-title" style="font-size: 17px">Quản lý loại tour</span>
                <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('book-tour.index') }}">
                <span class="menu-title" style="font-size: 17px">Quản lý đặt tour</span>
                <i class="mdi mdi-format-list-bulleted-type menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('posts.index') }}">
                <span class="menu-title" style="font-size: 17px">Quản lý bài viết</span>
                <i class="mdi mdi-newspaper menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              @auth
                @if(Auth::user()->role == 1 || Auth::user()->role == 0)
                  <a class="nav-link" href="{{ route('comments.index') }}">
                    <span class="menu-title" style="font-size: 17px">Quản lý bình luận</span>
                    <i class="mdi mdi-comment-multiple-outline menu-icon"></i>
                  </a>
                @endif
              @endauth
              
            </li>

            <li class="nav-item">
              @auth
                @if (Auth::user()->role == 1 )
                  <a class="nav-link" href="{{ route('users.index') }}">
                    <span class="menu-title" style="font-size: 17px">Quản lý tài khoản</span>
                    <i class="mdi mdi-account menu-icon"></i>
                  </a>
                @endif
              @endauth
            </li>
            
            {{-- <li class="nav-item">
              <a class="nav-link" href="#" onclick="confirmLogout()">
                <span class="menu-title">Đăng xuất</span>
                <i class="mdi mdi-logout menu-icon"></i>
              </a>
            </li> --}}

            {{--Đăng xuất--}}
            {{-- <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link">
                  <input class="menu-title" id="logout-btn" type="submit" value="Đăng xuất">
                  <i class="mdi mdi-logout menu-icon"></i>
                </a>
              </form>
            </li> --}}
          </ul>
        </nav>

        {{-- <script>
          function confirmLogout() {
            var result = confirm("Bạn có chắc chắn muốn đăng xuất không?");
            if (result) {
              // Nếu người dùng xác nhận, chuyển hướng đến trang đăng xuất
              window.location.href = "login";
            }
            if (!result) {
              window.location.current();
            }
          }
        </script> --}}
