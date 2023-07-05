@extends('layouts.app')
 
@section('title', 'Cập nhật tour')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('users.index') }}"> Quản lý tài khoản</a>
      / Cập nhật tài khoản
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <h3>Cập nhật tài khoản</h3><br>
                  <form method="POST" action="{{ route('users.update', ['user' => $u]) }}" enctype="multipart/form-data">


                      @csrf
                      @method('PUT')
                      <img id="preview" src="{{ $u->avatar }}" alt="Avatar" style="max-width: 300px;">
                      <br><br>
                      <label for="avatar" style="font-weight: 540; ">Ảnh đại diện</label><br>
                      <input class="form-control" type="file" id="image" name="avatar" onchange="previewImage()"/>
                      @error('avatar')
                          <div class="error-message">{{ $message }}</div>
                      @enderror <br>
                      <div class="form-group">
                          <label for="first_name">Họ</label>
                          <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $u->first_name) }}" placeholder="Họ">

                          @error('first_name')
                              <div class="error-message">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $u->name) }}" placeholder="Tên">
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row" name="gender">
                          <label class="col-sm-3 col-form-label">Giới tính</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="gender" id="genderRadios1" value="Nam" {{ old('gender', $u->gender) === 'Nam' ? 'checked' : ''}}>
                              <label class="form-check-label" style="color: black" for="genderRadios1">Nam</label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <input type="radio" class="form-check-input" name="gender" id="genderRadios2" value="Nam" {{ old('gender', $u->gender) === 'Nữ' ? 'checked' : '' }}>
                              <label class="form-check-label" style="color: black" for="genderRadios2">Nữ</label>
                            </div>
                          </div>
                        </div>
                        @error('gender')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                      </div>
                    
                
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $u->email) }}" placeholder="Email">
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group">
                      <label for="password">Mật khẩu:</label>
                      <div style="position: relative;">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" value="{{ old('password', $u->password) }}">

                        {{-- <span class="password-toggle" onclick="togglePasswordVisibility()"><i class="fa fa-eye"></i></span> --}}
                        @error('password')
                        <div class="error-message">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                
                    <div class="form-group">
                      <label for="address"> Địa chỉ </label>
                      <textarea class="form-control" id="description" name="address" rows="5" placeholder="Địa chỉ" >{{ old('address',$u->address ) }}</textarea>
                      @error('address')
                      <div class="error-message">{{ $message }}</div>
                      @enderror
                    </div>

                  <div class="form-group">
                      <label for="phone"> Số điện thoại </label>
                      <input type="number" class="form-control" id="num_day" name="phone" value="{{ old('phone', $u->phone) }}">
                      @error('phone')
                      <div class="error-message">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="exampleFormControlSelect1" class="form-label"> Loại tài khoản </label><br>
                      {{-- Admin khi đăng nhập không thể chỉnh sửa role của bản thân nhưng có thể chỉnh sửa role của người khác --}}
                      @if(Auth::user()->role == 1 && Auth::user()->id !== $u->id)
                        {{-- Hiển thị role dưới dạng select box cho admin --}}
                        <select class="form-select" id="exampleFormControlSelect1" name="role">
                          <option value="1" @if(old('status', $u->role) == 1) selected @endif>Admin</option>
                          <option value="0" @if(old('status', $u->role) == 0) selected @endif>Nhân viên</option>
                          <option value="2" @if(old('status', $u->role) == 2) selected @endif>Khách hàng</option>
                        </select>
                          
                      @else
                          {{-- Hiển thị nút chỉnh sửa role chỉ cho admin và không cho phép admin chỉnh sửa role của chính mình --}}
                          @if(old('status', $u->role) == 1) 
                              <p class="btn btn-danger" style="font-size: 15px">Admin</p>
                          @elseif(old('status', $u->role) == 0)
                              <p class="btn btn-warning" style="font-size: 15px">Nhân viên</p>
                          @else
                              <p class="btn btn-success" style="font-size: 15px">Khách hàng</p>
                          @endif
                      @endif

                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1" class="form-label">Trạng thái</label><br>
                    {{-- Admin khi đăng nhập không thể chỉnh sửa status của bản thân nhưng có thể chỉnh sửa status của người khác --}}
                    @if(Auth::user()->role == 1 && Auth::user()->id !== $u->id)
                      <select class="form-select" id="exampleFormControlSelect1" name="status" >
                        <option value="1" @if(old('status', $u->status) == 1) selected @endif>Hoạt động</option>
                        <option value="0" @if(old('status', $u->status) == 0) selected @endif>Không hoạt động</option>
                      </select>
                    @else
                      @if(old('status', $u->status) == 1) 
                      <p class="btn btn-success" style="font-size: 15px">Hoạt động</p>
                      @else
                        <p class="btn btn-warning" style="font-size: 15px">Không hoạt động</p>
                      @endif
                    @endif
                </div>
                      <!-- Các trường khác -->
                      <button type="submit" class="btn btn-primary">Cập nhật tài khoản</button>
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
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
<script>
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




