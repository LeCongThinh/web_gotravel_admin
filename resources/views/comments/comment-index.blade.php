@extends('layouts.app')
 
@section('title', 'Quản lý bình luận')

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
          <h4 class="card-title">Danh sách bình luận</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Tên tour</th>
                  <th> Đánh giá </th>
                  <th> Bình luận </th>
                  <th> Ngày đăng </th>
                  <th> Người đăng </th>
                  <th> Trạng thái </th>
                  <th> Tùy chỉnh </th>
                </tr>
              </thead>
              @foreach($cmt as $comment)
      
                <div class="tour">
                  <tbody>
                    <td>
                      <p>{{ $comment->title }}</p>
                    </td>
                    <td>
                      <div class="rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $comment->rating)
                                <i class="fas fa-star yellow-star"></i>
                            @else
                                <i class="far fa-star yellow-star"></i>
                            @endif
                        @endfor
                    </div>
                    </td>
                    <td>
                      <p>{{ $comment->comment }}</p>
                    </td>
                    <td>
                      <p>{{ $comment->comment_day }}</p>
                    </td>
                    <td>
                      <p>{{ $comment->user_name }}</p>
                    </td>
                    <td>
                      @if($comment->status == 1)
                        <p class="badge badge-gradient-success" style="font-size: 15px"> Đã duyệt </p>
                      @else
                        <p class="badge badge-gradient-warning" style="font-size: 15px"> Chưa duyệt </p>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route("comments.edit", ['comment'=>$comment]) }}">
                          <button type="button" class="btn btn-danger btn-sm">Cập nhật</button>
                        </a>
                      </div>
                    </td>
                    {{-- <td>
                      @if($p->status == 1)
                        <p class="badge badge-gradient-success" style="font-size: 15px">Hoạt động</p>
                      @else
                        <p class="badge badge-gradient-warning" style="font-size: 15px">Không hoạt động</p>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route("posts.edit", ['post'=>$p]) }}">
                          <button type="button" class="btn btn-danger btn-sm">Cập nhật</button>
                        </a>
                      </div>
                    </td> --}}
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




