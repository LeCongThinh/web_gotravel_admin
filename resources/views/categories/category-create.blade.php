@extends('layouts.app')
 
@section('title', 'Thêm tour')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('categories.index') }}"> Quản lý loại tour</a>
      / Thêm loại tour mới
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Thêm loại tour mới</h3><br>
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên loại tour</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập tên loại tour">
                            @error('name')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Thêm loại tour</button>
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




