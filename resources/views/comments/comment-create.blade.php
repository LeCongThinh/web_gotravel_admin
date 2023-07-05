@extends('layouts.app')
 
@section('title', 'Thêm bình luận')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('comments.index') }}"> Quản lý bình luận </a>
      / Thêm bình luận mới
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Thêm bình luận mới</h3><br>
                    <form method="POST" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Tên tour</label>
                            <input type="hidden" name="title" value="{{ $tourName }}">
                            <p style="font-size: 25px;">{{ $tourName }}</p>
                        </div>
                        <div class="form-group" style="display: none;">
                          <label for="title">Id tour</label>
                          <input type="hidden" name="tour_id" value="{{ $tourId }}">
                          <p style="font-size: 25px;">{{ $tourId }}</p>
                      </div>
                        
                        <div class="form-group">
                          <label for="content">Đánh giá</label>
                          <div class="contain">
                            <div class="star-widget">
                              <input type="radio" name="rating" id="rate-5" value="5">
                              <label for="rate-5" class="fas fa-star"></label>
                              <input type="radio" name="rating" id="rate-4" value="4">
                              <label for="rate-4" class="fas fa-star"></label>
                              <input type="radio" name="rating" id="rate-3" value="3">
                              <label for="rate-3" class="fas fa-star"></label>
                              <input type="radio" name="rating" id="rate-2" value="2">
                              <label for="rate-2" class="fas fa-star"></label>
                              <input type="radio" name="rating" id="rate-1" value="1">
                              <label for="rate-1" class="fas fa-star"></label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="comment"> Bình luận </label>
                          <textarea class="form-control" id="comment" name="comment" value="{{ old('comment') }}" rows="10" placeholder="Bình luận"></textarea>
                          @error('comment')
                          <div class="error-message">{{ $message }}</div>
                          @enderror
                        </div>
                      
                        <button type="submit" class="btn btn-success">Thêm bình luận</button>
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




