@extends('layouts.app')
 
@section('title', 'Thêm tour')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('tours.index') }}"> Quản lý tours</a>
      / Thêm tour mới
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Thêm tour mới</h3><br>
                    <form method="POST" action="{{ route('tours.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên tour</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập tên tour">
                            @error('name')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                                
                        </div>
                        <div class="form-group">
                          <label for="image">Ảnh tour</label><br>
                          <!-- <input type="file" class="form-control-file" id="image" name="image" onchange="previewImage()"> -->
                          <input class="form-control" type="file" id="image" name="image" onchange="previewImage()"/>
                          @error('image')
                          <div class="error-message">{{ $message }}</div>
                          @enderror
                          <br>
                          <img id="preview" src="../assets/images/image_blank.png" alt="Preview Image" style="max-width: 300px;">
                        </div>
                        <div class="form-group">
                            <label for="a">Điểm đến</label>
                            <input type="text" class="form-control" id="a" name="location" value="{{ old('location') }}" placeholder="Nhập điểm đến" >
                            @error('location')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="day">Số ngày đi</label>
                            <input type="number" class="form-control" id="num_day" name="num_day" value="{{ old('num_day') }}">
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
                              value="{{ old('departure_day') }}"
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
                                <option value="{{ $type->id }}" @if($type->id==old('category')) selected @endif>{{ $type->name }}</option>
                              @endforeach
                            </select>
                            @error('category')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Mô tả tour</label>
                            <textarea class="form-control" id="desc" name="description" value="{{ old('description') }}" rows="5" placeholder="Mô tả ngắn tour" ></textarea>
                            @error('description')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Giá tour</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" >
                            @error('price')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-success">Thêm tour</button>

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




