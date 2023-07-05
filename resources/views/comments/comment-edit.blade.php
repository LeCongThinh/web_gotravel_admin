@extends('layouts.app')
 
@section('title', 'Cập nhật bình luận')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('comments.index') }}"> Quản lý bình luận</a>
      / Cập nhật bình luận
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Cập nhật bình luận</h3><br>
                    <form method="POST" action="{{ route('comments.update',['comment'=>$comment]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên tour</label>
                            <p style="font-size: 25px;">{{ $comment->title }}</p>
                            @error('title')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Đánh giá</label>
                            <div class="contain">
                                <div class="star-widget">
                                    <input type="radio" name="rating" id="rate-5" value="5" @if($comment->rating == 5) checked @endif>
                                    <label for="rate-5" class="fas fa-star"></label>
                                    <input type="radio" name="rating" id="rate-4" value="4" @if($comment->rating == 4) checked @endif>
                                    <label for="rate-4" class="fas fa-star"></label>
                                    <input type="radio" name="rating" id="rate-3" value="3" @if($comment->rating == 3) checked @endif>
                                    <label for="rate-3" class="fas fa-star"></label>
                                    <input type="radio" name="rating" id="rate-2" value="2" @if($comment->rating == 2) checked @endif>
                                    <label for="rate-2" class="fas fa-star"></label>
                                    <input type="radio" name="rating" id="rate-1" value="1" @if($comment->rating == 1) checked @endif>
                                    <label for="rate-1" class="fas fa-star"></label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="comment">Bình luận</label>
                            <p>
                            <textarea class="form-control" id="desc" name="comment" rows="10" placeholder="Bình luận">{{ old('comment', $comment->comment) }}</textarea>
                            </p>
                            @error('comment')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="form-label">Trạng thái</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="status" >
                              <option value="1" @if(old('status', $comment->status) == 1) selected @endif> Đã duyệt </option>
                              <option value="0" @if(old('status', $comment->status) == 0) selected @endif> Chưa duyệt </option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-success">Lưu bình luận</button>


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




