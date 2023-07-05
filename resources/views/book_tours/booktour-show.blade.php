@extends('layouts.app')

@section('title', 'Chi tiết tour')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('tours.index') }}"> Quản lý đặt tour</a>
      / Chi tiết tours đã đặt
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            {{-- <a href="{{ route('comments.create') }}">
              <button class="btn btn-success" data-toggle="modal" data-target="#addTourModal">Thêm bình luận</button>
            </a> --}}
            {{-- {{ route('book-tour.print-invoice', $bookTour->id) }} --}}
            <a href="{{ route('book-tour.download_invoice', $bookTour->id) }}" class="btn btn-primary" target="_blank">In hóa đơn</a>
          </div>
          
            <div class="invoice">
                                
              <div class="header">
                  <h1>THANH TOÁN HÓA ĐƠN</h1>
              </div>
              <div class="content">
                  <h3>Mã hóa đơn: {{ $bookTour->invoice_code }}</h3>
                  <p>Tên khách hàng: {{ $bookTour->user_name }}</p>
                  <p>SĐT liên hệ: {{ $bookTour->phone }}</p>
                  <p>Phương thức thanh toán: {{ $bookTour->payment }}</p>
                  <p>Ngày lập hóa đơn: {{ $bookTour->created_at }}</p>
                  <p>Người lập hóa đơn: {{ App\Models\User::find($bookTour->user_id)->name }}</p>



                  <table>
                      <thead>
                          <tr>
                              <th>Tên tour</th>
                              <th>Ngày khởi hành</th>
                              <th>Số lượng người đi</th>
                              <th>Đơn giá</th>
                              <th>Thành tiền</th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>{{ $bookTour->tour_name }}</td>
                          <td>{{ $bookTour->departure_day }}</td>

                          <td>
                            <p>Người lớn: {{ $bookTour->adult }} người</p>
                            @if ($bookTour->child>0)
                              <p>Trẻ em: {{ $bookTour->child }} người</p>
                            @endif
                          </td>
                          <td>{{ number_format($bookTour->price) }} VND</td>
                          <td>{{ number_format($bookTour->sum_price) }} VND</td>
                      </tr>
                          
                      </tbody>
                      <tfoot>
                          <tr>
                              <td colspan="4" style="text-align: center; background-color: #a2d2ff">Tổng cộng:</td>
                              <td>{{ number_format($bookTour->sum_price) }} VND</td>
                            </tr>
                          </tr>
                      </tfoot>
                  </table>
              </div>
              <div class="footer">
                  <p style="font-size: 25px">Cảm ơn quý khách đã sử dụng dịch vụ của chúng tôi!</p>

              </div>
          
      
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


