@extends('layouts.app')
 
@section('title', 'Cập nhật bài viết')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('users.index') }}"> Quản lý bài viết</a>
      / Cập nhật bài viết
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <h3>Cập nhật bài viết</h3><br>
                  <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                
                    <!-- Các trường dữ liệu chỉnh sửa -->
                    <div class="form-group">
                        <label for="title">Tiêu đề:</label>
                        <input type="text" name="title" id="title" value="{{ $post->title }}" class="form-control">
                    </div>
                
                    <div class="form-group">
                        <label for="content">Nội dung:</label>
                        <textarea name="content" id="content" class="form-control">{!! $post->content !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="form-label">Trạng thái</label>
                        <select class="form-select" id="exampleFormControlSelect1" name="status" >
                          <option value="1" @if(old('status', $post->status) == 1) selected @endif>Hoạt động</option>
                          <option value="0" @if(old('status', $post->status) == 0) selected @endif>Không hoạt động</option>
                        </select>
                    </div>
                    <!-- Nút cập nhật -->
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
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
    ClassicEditor
        .create( document.querySelector( '#content' ),
        {
            ckfinder:
            {
                //load ảnh lên ckeditor
                uploadUrl:"{{route('ckeditor.upload',['_token'=>csrf_token()])}}",
            }
        } )
        .catch( error => {
            console.error( error );
        } );
</script>

@endsection




