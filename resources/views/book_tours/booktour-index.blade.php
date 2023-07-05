@extends('layouts.app')
 
@section('title', 'Quản lý đặt tour')

@section('content')
<div class="content-wrapper">
  
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            {{-- <a href="{{ route('comments.create') }}">
              <button class="btn btn-success" data-toggle="modal" data-target="#addTourModal">Thêm bình luận</button>
            </a> --}}
            
          </div>
          <h4 class="card-title">Danh sách tour đã đặt</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Tên tour</th>
                  <th> Ngày khởi hành </th>
                  <th> Số người </th>
                  <th> Tổng chi phí </th>
                  <th> Người đặt </th>
                  <th> Trạng thái </th>
                  <th> Tùy chỉnh </th>
                </tr>
              </thead>
              @foreach($bk as $booktour)
    
                    <div class="booktours">
                      <tbody>
                        <td>
                          <p>{{ $booktour->tour_name }}</p>
                        </td>

                        <td>
                          <p>{{ $booktour->departure_day }}</p>
                        </td>
                        <td>
                          <p>Người lớn: {{ $booktour->adult }} người</p>
                          @if ($booktour->child > 0)
                            <p>Trẻ em: {{ $booktour->child }} người</p>
                          @endif
                        </td>
                        <td>
                          <p>{{ number_format($booktour->sum_price) }} VND</p>
                        </td>
                        <td>
                          <p>{{ $booktour->user_name }}</p>
                        </td>
                        <td>
                          @if($booktour->status == 1)
                          <p class="badge badge-gradient-success" style="font-size: 15px">Hoạt động</p>
                        @else
                          <p class="badge badge-gradient-warning" style="font-size: 15px">Không hoạt động</p>
                        @endif
                      </td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ route('book-tour.show', $booktour->id) }}">
                              <button type="button" class="btn btn-danger btn-sm">Chi tiết</button>
                            </a>
                            
                            
                          </div>
                        </td>

                      </tbody>
                    </div>
                @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection




