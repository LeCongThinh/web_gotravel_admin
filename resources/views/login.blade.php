<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />
  </head>
  <!--Body-->
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="text-center font-weight-normal navbar-brand-wrapper d-flex align-items-center justify-content-center">
                  <a class="navbar-brand brand-logo" href="index.html" style="font-size: 1.5em; color: rgb(56, 42, 67);">
                    <i class="mdi mdi-map-marker-multiple" style="font-size: 1.5em; color: rgb(56, 42, 67);"></i>GoTravel
                  </a>
                </div>
                <h4 style="font-size: 2em; text-align: center;">Đăng Nhập</h4>
                <!-- <form class="pt-3" method="post" action="{{route('login')}}">
                    @csrf
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <a class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" href="index.html">SIGN IN</a>
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                  
                  <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.html" class="text-primary">Create</a>
                  </div>
                </form> -->
                <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nhập email" id="email" class="form-control" name="email" required
                                    autofocus><br>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
 
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Nhập mật khẩu" id="password" class="form-control" name="password" required><br>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
 
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Lưu thông tin tài khoản
                                    </label>
                                </div>
                            </div>
 
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Đăng Nhập</button>
                            </div>
                        </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
  <!--end body-->
</html>