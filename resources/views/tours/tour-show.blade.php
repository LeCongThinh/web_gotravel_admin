@extends('layouts.app')

@section('title', 'Chi tiết tour')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('tours.index') }}"> Quản lý tours</a>
      / Chi tiết tours
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">

          <div class="tour">
            <h1 style="text-align: center; font-size: 50px">{{ $p->name }}</h1><p><br></p>
            <div class="image-container">
              <img src="{{ $p->image }}" alt="Ảnh" onclick="enlargeImage(this)">
              
            </div>
            <br><br>
            <div class="row">
              <div class="d-flex justify-content-around">

              
                <div class="col-auto">
                  <h3 style="text-align: center; font-size: 30px" class="mb-0"><i class="mdi mdi-map-marker btn-icon-prepend"></i>{{ $p->location }}</h3>
                </div>
                <div class="col-auto">
                  <h3 style="text-align: center; font-size: 30px" class="mb-0"><i class="mdi mdi-av-timer btn-icon-prepend"></i>{{ $p->num_day }} ngày</h3>
                </div>
                <div class="col-auto">
                  <h3 style="text-align: center; font-size: 30px" class="mb-0"><i class="mdi mdi-calendar-today btn-icon-prepend"></i>{{ $p->departure_day }}</h3>
                </div>
              
            </div>
            </div>
  
            </div>
            
            {{-- <h3 style="text-align: center;">{{ $p->num_day }} ngày</h3> --}}
            {{-- <p style="text-align: center; font-size: 50px">{{ $p->departure_day }}</p> --}}
            <p style="text-align: center; font-size: 50px">{{ $p->category->name }}</p>

            <p style="text-align: center; font-size: 50px">{{ $p->description }}</p>
            <p style="font-size: 30px; text-align: center;">Giá tour: {{ number_format($p->price) }} VND</p>
          </div>
        </div>
      </div>
      
      
    </div>
  </div>
</div>

@endsection


