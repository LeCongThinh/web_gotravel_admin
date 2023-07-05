@extends('layouts.app')
 
@section('title', 'Cập nhật tour')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('tours.index') }}"> Quản lý tours</a>
      / Cập nhật tour
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Cập nhật tour</h3><br>
                    <form method="POST" action="{{ route('tours.update',['tour'=>$p]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên tour</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $p->name) }}" placeholder="Nhập tên tour">
                            @error('name')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                                
                        </div>
                        <div class="form-group">
                          <label for="image">Ảnh tour</label><br>
                          <!-- <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage()"> -->
                          {{-- <img style="max-height: 500px" src="{{ $p->image }}" alt="Ảnh" > <br> <br> --}}
                          <input class="form-control" type="file" id="image" name="image" onchange="previewImage()"/>

                          <img id="preview" style="max-height: 500px" src="{{ old('image', $p->image) }}" alt="Ảnh" alt="Preview Image" style="max-height: 500px;">

                          @error('image')
                          <div class="error-message">{{ $message }}</div>
                          @enderror
                          <br>
                        </div>
                        <div class="form-group">
                            <label for="a">Điểm đến</label>
                            <input type="text" class="form-control" id="a" name="location" value="{{ old('location', $p->location) }}" placeholder="Nhập điểm đến" >
                            @error('location')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="day">Số ngày đi</label>
                            <input type="number" class="form-control" id="num_day" name="num_day" value="{{ old('num_day', $p->num_day) }}" >
                            @error('num_day')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Ngày khởi hành</label>
                          <input
                              class="form-control"
                              type="datetime-local"
                              value="2023-04-30T12:30:00"
                              id="html5-datetime-local-input"
                              name="departure_day"
                              value="{{ old('departure_day', $p->departure_day) }}"
                            />
                            @error('departure_day')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="form-label">Loại tour</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="category" >
                            <option value="">Chọn loại tour</option>
    
                              @foreach($lst as $type)
                                <option value="{{ $type->id }}" @if($type->id == old('category', $p->category_id)) selected @endif>{{ $type->name }}</option>
                              @endforeach
                            </select>
                            @error('category')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả tour</label>
                            <p>
                            <textarea class="form-control" id="desc" name="description" rows="10" placeholder="Mô tả ngắn tour">{{ old('description', $p->description) }}</textarea>
                            </p>
                            @error('description')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá tour</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $p->price) }}">
                            @error('price')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1" class="form-label">Trạng thái</label>
                          <select class="form-select" id="exampleFormControlSelect1" name="status" >
                            <option value="1" @if(old('status', $p->status) == 1) selected @endif>Hoạt động</option>
                            <option value="0" @if(old('status', $p->status) == 0) selected @endif>Không hoạt động</option>
                          </select>
                      </div>
                        
                        <button type="submit" class="btn btn-success">Lưu tour</button>

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
    function previewImage() {
    const preview = document.getElementById('preview');
    const fileInput = document.getElementById('image');
    const file = fileInput.files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
    }
</script>
<script>
  ClassicEditor
      .create( document.querySelector( '#desc' ),
      {
          ckfinder:
          {
              uploadUrl:"{{route('toureditor.loadimage',['_token'=>csrf_token()])}}",
          }
      } )
      .catch( error => {
          console.error( error );
      } );
</script>
@endsection




