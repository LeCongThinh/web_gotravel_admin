@extends('layouts.app')
 
@section('title', 'Quản lý bài viết')

@section('content')
<div class="content-wrapper">
  
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('posts.create') }}">
              <button class="btn btn-success" data-toggle="modal" data-target="#addTourModal">Thêm bài viết</button>
            </a>
            
          </div>
          <h4 class="card-title">Danh sách bài viết</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> Tiêu đề </th>
                  <th> Nội dung </th>
                  <th> Ngày đăng </th>
                  <th> Tác giả </th>
                  <th> Trạng thái </th>
                  <th> Tùy chỉnh </th>
                </tr>
              </thead>
              
                @foreach($ps as $p)
    
                    <div class="tour">
                      <tbody>
                        <td>
                          <p>{{ $p->title }}</p>
                        </td>
                        
                        <td>
                          <div class="limit-cell">
                              <p>{!! $p->content !!}</p>
                          </div>
                        </td>
                        <td>
                          <p>{{ $p->publish_day }}</p>
                        </td>
                        <td>
                          <p>{{ $p->author }}</p>
                        </td>
                        <td>
                          @if($p->status == 1)
                            <p class="badge badge-gradient-success" style="font-size: 15px"> Đã duyệt </p>
                          @else
                            <p class="badge badge-gradient-warning" style="font-size: 15px"> Chưa duyệt </p>
                          @endif
                        </td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ route("posts.edit", ['post'=>$p]) }}">
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




