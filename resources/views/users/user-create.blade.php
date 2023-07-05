@extends('layouts.app')
 
@section('title', 'Thêm tài khoản')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('users.index') }}"> Quản lý tài khoản</a>
      / Thêm tài khoản mới
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Thêm tài khoản mới</h3><br>
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <br>
                              <img id="preview" src="../assets/images/no_avatar.png" alt="Avatar" style="max-width: 300px;">
                            <br><br>
                            <label for="avatar" style="font-weight: 540; ">Ảnh đại diện</label><br>
                            <!-- <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage()"> -->
                            <input class="form-control" type="file" id="image" name="avatar" onchange="previewImage()"/>
                            @error('avatar')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                          </div>
                            
                        <div class="form-group">
                            <label for="first_name">Họ</label>
                            <input type="text" class="form-control" id="name" name="first_name" value="{{ old('first_name') }}" placeholder="Họ">
                            @error('first_name')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                                
                        </div>
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Tên">
                            @error('name')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                                
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="name" name="email" value="{{ old('email') }}" placeholder="Email">
                            @error('email')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                                
                        </div>

                        <div class="form-group">
                          <label for="password">Mật khẩu:</label>
                          <div style="position: relative;">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
                            <span class="password-toggle" onclick="togglePasswordVisibility()"><i class="fa fa-eye"></i></span>
                            @error('password')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row" name="gender">
                            <label class="col-sm-3 col-form-label">Giới tính</label>
                            <div class="col-sm-4">
                              <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" id="genderRadios1" value="Nam" {{ old('gender') == 'Nam' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderRadios1">Nam</label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <input type="radio" class="form-check-input" name="gender" id="genderRadios2" value="Nữ" {{ old('gender') == 'Nữ' ? 'checked' : '' }}>
                                <label class="form-check-label" for="genderRadios2">Nữ</label>
                              </div>
                            </div>
                          </div>
                          @error('gender')
                              <div class="error-message">{{ $message }}</div>
                          @enderror
                        </div>
                        <div class="form-group">
                            <label for="address"> Địa chỉ </label>
                            <textarea class="form-control" id="description" name="address" value="{{ old('address') }}" rows="5" placeholder="Địa chỉ" ></textarea>
                            @error('address')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                          </div>

                        <div class="form-group">
                            <label for="phone"> Số điện thoại </label>
                            <input type="number" class="form-control" id="num_day" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="form-label"> Loại tài khoản </label>
                            <select class="form-select" id="exampleFormControlSelect1" name="role" >
                              <option value="1" > Admin </option>
                              <option value="0" > Nhân viên </option>
                              <option value="2" > Khách hàng </option>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Thêm tài khoản</button>

                    </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    function previewImage() {
    const preview = document.getElementById('preview');
    const fileInput = document.getElementById('image');
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
    }
</script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script><script>
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var passwordToggle = document.querySelector(".password-toggle");
  
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      passwordToggle.innerHTML = '<i class="fa fa-eye-slash"></i>';
    } else {
      passwordInput.type = "password";
      passwordToggle.innerHTML = '<i class="fa fa-eye"></i>';
    }
  }
</script>

      
@endsection




