@extends('layouts.app')

@section('title', 'Quản lý tour')
 
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
          {{-- href="{{ route('tours.create') }}" --}}
          {{-- tours là đường dẫn "/tours" còn create là phương thức create trong TourController --}}
          <a href="{{ route('tours.create') }}">
            <button class="btn btn-success" data-toggle="modal" data-target="#addTourModal">Thêm tour</button>
          </a>
        </div>
          <h4 class="card-title">Danh sách tour</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Tên tour </th>
                  <th> Ảnh </th>
                  <th> Địa điểm </th>
                  <th> Số ngày đi </th>
                  <th> Ngày khởi hành </th>
                  <th> Mô tả </th>
                  <th> Chi phí </th>
                  <th> Trạng thái </th>
                  <th> Tùy chỉnh </th>
                </tr>
              </thead>
              
                @foreach($lst as $p)
    
                    <div class="tour">
                      <tbody>
                        <td>
                          <p>{{ $p->name }}</p>
                        </td>
                        <td>
                          <img style="width: 200px; height: auto; border-radius: 0;" src="{{ $p->image }}" alt="Ảnh" onclick="enlargeImage(this)">
                        </td>
                        <td>
                          <p>{{ $p->location }}</p>
                        </td>
                        <td>
                          @if($p->num_day>1)
                            <p>{{ $p->num_day }} ngày {{ $p->num_day-1 }} đêm</p>
                          @else
                            <p>{{ $p->num_day }} ngày</p>
                          @endif
                        </td>
                        <td>
                          <p>{{ $p->departure_day }}</p>
                        </td>
                        <td class="desc-edit">
                          <p>{!! $p->description !!}</p>
                        </td>
                        <td>
                          <p class="btn btn-gradient-primary" style="font-size: 15px">{{ number_format($p->price) }} VND</p>
                        </td>
                        <td>
                          @if($p->status == 1)
                            <p class="badge badge-gradient-success" style="font-size: 15px">Hoạt động</p>
                          @else
                            <p class="badge badge-gradient-warning" style="font-size: 15px">Không hoạt động</p>
                          @endif
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ route("tours.edit", ['tour'=>$p]) }}">
                              <button type="button" class="btn btn-danger btn-sm" onclick="loadTourName()">Cập nhật</button>
                            </a>
                            <a href="{{ route('comments.create', ['tourName' => $p->name, 'tourId' => $p->id]) }}">
                              <button type="button" class="btn btn-success btn-sm">Bình luận</button>
                            </a>
                              <a href="{{ route('book-tour.create', ['tourName' => $p->name, 'tourId' => $p->id, 'departureDay' => $p->departure_day, 'price'=>$p->price ]) }}">
                                <button type="button" class="btn btn-primary btn-sm">Đặt tour</button>
                              </a>
                          </div>
                        </td>
                      </tbody>
                    </div>
                
                @endforeach

             
            </table>
          </div>
          
          <div class="pagination d-flex justify-content-end mb-3">
            {{ $lst->links('pagination::bootstrap-4') }}
         </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  ClassicEditor
      .create(document.querySelector('#desc'), {
          ckfinder: {
              uploadUrl: "{{ route('ckeditor.upload') }}"
          }
      })
      .catch(error => {
          console.error(error);
      });
</script>

@endsection

{{-- <script>
  function enlargeImage(img) {
    if (img.style.width === "200px") {
      // Phóng to ảnh
      img.style.width = "300px";
      img.style.height = "auto";
    } else {
      // Thu nhỏ ảnh về kích thước ban đầu
      img.style.width = "200px";
      img.style.height = "auto";
    }
  }
</script> --}}