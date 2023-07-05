@extends('layouts.app')

@section('title', 'Quản lý loại tour')
 
@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
          {{-- href="{{ route('tours.create') }}" --}}
          {{-- tours là đường dẫn "/tours" còn create là phương thức create trong TourController --}}
          <a href="{{ route('categories.create') }}">
            <button class="btn btn-success" data-toggle="modal" data-target="#addTourModal">Thêm loại tour</button>
          </a>
        </div>
          <h4 class="card-title">Danh sách loại tour</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Tên loại tour </th>
                  <th> Trạng thái </th>
                  <th> Tùy chỉnh </th>
                </tr>
              </thead>
              
                @foreach($lst as $cate)
    
                    <div class="tour">
                      <tbody>
                        <td>
                          <p>{{ $cate->name }}</p>
                        </td>
                        <td>
                            @if($cate->status == 1)
                            <p class="badge badge-gradient-success" style="font-size: 15px">Hoạt động</p>
                          @else
                            <p class="badge badge-gradient-warning" style="font-size: 15px">Không hoạt động</p>
                          @endif
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ route("categories.edit", ['category'=>$cate]) }}">
                              <button type="button" class="btn btn-danger btn-sm">Cập nhật</button>
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
