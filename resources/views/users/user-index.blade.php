@extends('layouts.app')

@section('title', 'Quản lý tài khoản')

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            {{-- href="{{ route('tours.create') }}" --}}
            <a href="{{ route('users.create') }}">
              <button class="btn btn-success" data-toggle="modal" data-target="#addTourModal">Thêm tài khoản</button>
            </a><br>
          </div>
          {{-- <div class="d-flex justify-content-end mb-3 align-items-center">
            <div class="form-group me-3">
              <h4>Lọc theo tài khoản: </h4>
            </div>
            <div class="form-group me-3" style="display: flex; align-items: center;">
              <select class="form-select" id="roleFilter" name="role">
                <option value="all">Tất cả</option>
                <option value="1">Admin</option>
                <option value="0">Nhân viên</option>
                <option value="2">Khách hàng</option>
              </select>
            </div>
            <div class="form-group me-3">
              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label" style="font-size: 20px;">
                  <input type="checkbox" id="activeFilter" class="form-check-input" style="width: 50px; height: 50px;">Hoạt động</label>
              </div>
            </div>
            <div class="form-group me-3">
              <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label" style="font-size: 20px;">
                  <input type="checkbox" id="inactiveFilter" class="form-check-input" style="width: 50px; height: 50px;">Không hoạt động</label>
              </div>
            </div>
            <button id="filterButton" class="btn btn-primary">Lọc</button>

            
          </div> --}}
          <br>
          <h4 class="card-title">Danh sách tài khoản</h4>
          <div class="table-responsive">
            <table id="userTable" class="table">
              <thead>
                <tr>
                  <th>Ảnh đại diện</th>
                  <th>Họ</th>
                  <th>Tên</th>
                  <th>Giới tính</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th>Loại tài khoản</th>
                  <th>Trạng thái</th>
                  <th>Tùy chỉnh</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lst as $u)
                <tr>
                  <td>
                    <img style="width: 150px; height: 150px" src="{{ $u->avatar }}" alt="Ảnh" onclick="enlargeImage(this)">
                  </td>
                  <td>
                    <p>{{ $u->first_name }}</p>
                  </td>
                  <td>
                    <p>{{ $u->name }}</p>
                  </td>
                  <td>
                    <p>{{ $u->gender }}</p>
                  </td>
                  <td>
                    <p>{{ $u->email }}</p>
                  </td>
                  <td>
                    <p>{{ $u->phone }}</p>
                  </td>
                  <td>
                    <p>{{ $u->address }}</p>
                  </td>
                  <td>
                    <p>{{ $u->role == 1 ? 'Admin' : ($u->role == 0 ? 'Nhân viên' : 'Khách hàng') }}</p>
                  </td>
                  <td>
                    @if($u->status == 1)
                    <p class="badge badge-gradient-success" style="font-size: 15px">Hoạt động</p>
                    @else
                    <p class="badge badge-gradient-warning" style="font-size: 15px">Không hoạt động</p>
                    @endif
                  </td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route('users.edit',['user'=>$u]) }}">
                        <button type="button" class="btn btn-danger btn-sm">Cập nhật</button>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <!-- Phân trang -->
          <div class="pagination d-flex justify-content-end mb-3">
            {{ $lst->links('pagination::bootstrap-4') }}
        </div>
        

        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
  // Lắng nghe sự kiện khi nút lọc được nhấn
  $('#filterButton').click(function() {
    // Gọi hàm filterTable() để lọc dữ liệu
    filterTable();
  });

  // Hàm để lọc và hiển thị lại dữ liệu trong bảng dựa trên các giá trị đã chọn
  function filterTable() {
    var role = $('#roleFilter').val();
    var isActive = $('#activeFilter').is(':checked');
    var isInactive = $('#inactiveFilter').is(':checked');

    // Hiển thị lại dữ liệu trong bảng dựa trên các giá trị đã chọn
    $('#userTable tbody tr').each(function() {
      var userRole = $(this).find('td:eq(7) p').text();
      var userStatus = $(this).find('td:eq(8) p').text();

      // Kiểm tra các điều kiện lọc và ẩn/hiện dòng tương ứng
      if ((role === 'all' || userRole === role) &&
        ((isActive && userStatus === 'Hoạt động') || (isInactive && userStatus === 'Không hoạt động'))) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  }

  // Tải lại dữ liệu khi trang được tải lần đầu
  filterTable();
});

</script>

@endsection