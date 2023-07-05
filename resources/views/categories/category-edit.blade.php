@extends('layouts.app')
 
@section('title', 'Cập nhật tour')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('categories.index') }}"> Quản lý loại tours</a>
      / Cập nhật loại tour
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Cập nhật loại tour</h3><br>
                    <form method="POST" action="{{ route('categories.update',['category'=>$cate]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên tour</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cate->name) }}" placeholder="Nhập tên tour">
                            @error('name')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleFormControlSelect1" class="form-label">Trạng thái</label>
                          <select class="form-select" id="exampleFormControlSelect1" name="status" >
                            <option value="1" @if(old('status', $cate->status) == 1) selected @endif>Hoạt động</option>
                            <option value="0" @if(old('status', $cate->status) == 0) selected @endif>Không hoạt động</option>
                          </select>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Lưu loại tour</button>


                    </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection




