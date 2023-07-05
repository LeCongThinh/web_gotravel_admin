{{-- @foreach($lst as $u)
  <div class="user">
    <tbody>
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
          <p>{{ $u->role==1?'Admin': ($u->role == 0?'Nhân viên':'Khách hàng') }}</p>
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
      </tbody>
  </div>
@endforeach --}}
