@extends('layouts.app')
 
@section('title', 'Thêm bài viết')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('posts.index') }}"> Quản lý bài viết</a>
      / Thêm bài viết mới
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Thêm bài viết mới</h3><br>
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tiêu đề bài viết</label>
                            <input type="text" class="form-control" id="name" name="title" value="{{ old('title') }}" placeholder="Nhập tiêu đề bài viết">
                            @error('title')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Mô tả tour</label>
                            <textarea class="form-control" id="content" name="content" value="{{ old('content') }}" rows="5" placeholder="Nội dung bài viết" ></textarea>
                            @error('content')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-success">Thêm bài viết</button>

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




