@extends('layouts.app')

@section('title', 'Đặt tour')

@section('content')
<div class="content-wrapper">
  <div class="page-header">
    <h2 class="page-title" id="link-page">
      <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-home"></i>
      </span> <a id="link-page" href="{{ route('book-tour.index') }}"> Quản lý đặt tour </a>
      / Đặt tour
    </h2>
  </div>
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h3>Đặt tour</h3><br>
                <form method="POST" action="{{ route('book-tour.store') }}" enctype="multipart/form-data">
                  @csrf
              
                  <div class="form-group">
                      <h4>Tên tour</h4>
                      <input type="hidden" name="tour_name" value="{{ $tourName }}">
                      <p style="font-size: 25px;">{{ $tourName }}</p>
                  </div>
              
                  <div class="form-group" style="display: none;">
                      <label for="tour_id">Id tour</label>
                      <input type="hidden" name="tour_id" value="{{ $tourId }}">
                      <p style="font-size: 25px;">{{ $tourId }}</p>
                  </div>
              
                  <div class="form-group">
                      <h4 for="departure_day">Ngày khởi hành</h4>
                      <input type="hidden" name="departure_day" value="{{ $departureDay }}">
                      <p style="font-size: 25px;">{{ $departureDay }}</p>
                  </div>
              
                  <div class="form-group">
                      <h4 for="price">Giá</h4>
                      <input type="hidden" name="price" id="price" value="{{ $price }}">
                      <p style="font-size: 25px; color: #ffb703;font-weight: bold">{{ number_format($price) }}</p>
                  </div>
              
                  <div class="form-group">
                      <h4 for="user_name">Họ tên người liên hệ</h4>
                      <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" placeholder="Tên">
                      @error('user_name')
                      <div class="error-message">{{ $message }}</div>
                      @enderror
                  </div>
              
                  <div class="form-group">
                      <h4 for="email">Email liên hệ</h4>
                      <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Email">
                      @error('email')
                      <div class="error-message">{{ $message }}</div>
                      @enderror
                  </div>
              
                  <div class="form-group">
                      <h4 for="phone">Số điện thoại liên hệ</h4>
                      <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Số điện thoại">
                      @error('phone')
                      <div class="error-message">{{ $message }}</div>
                      @enderror
                  </div>
              
                  <div class="form-group">
                      <h4 for="quantity-adult">Số lượng người lớn</h4><br><br>
                      <div style="font-size: 25px">
                          <label style="font-size: 25px">Người lớn ( trên 18 tuổi ) <span style="margin-left: 10px; margin-right: 20px; color: #ffb703; text-decoration: underline;font-style: italic;"> x {{ number_format($price) }}/vé</span></label>
                          <button type="button" class="adult-minus-btn">-</button>
                          <input style="text-align: center; border: none; width: 80px;" type="number" name="adult" id="quantity-adult" value="1" min="1">
                          <button type="button" class="adult-plus-btn">+</button>
                      </div>
                  </div>
              
                  <div class="form-group">
                      <h4 for="quantity-child">Số lượng trẻ em</h4><br><br>
                      <div style="font-size: 25px">
                          <label style="font-size: 25px">Trẻ em ( từ 0 - 17 tuổi ) <span style="margin-left: 30px; margin-right: 20px; color: #ffb703; text-decoration: underline;font-style: italic;"> x {{ is_numeric($price) ? number_format($price * 0.5) : 0 }}/vé</span></label>
                          <button type="button" class="child-minus-btn">-</button>
                          <input style="text-align: center; border: none; width: 80px;" type="text" name="child" id="quantity-child" value="0" readonly>
                          <button type="button" class="child-plus-btn">+</button>
                      </div>
                  </div>
              
                  <div class="form-group">
                      <h4 for="sum_price">Tổng giá</h4><br>
                      <p class="btn btn-warning btn-sm" style="font-size: 25px; " id="total-price" name="sum_price" value="{{ old('sum_price') }}">0</p>
                  </div>
              
                  <h2>Chọn phương thức thanh toán</h2><br>
                  <div class="payment-method-group" style="color:#ffb703">
                    <label class="payment-method" >
                      <input type="radio" name="payment_method" value="Thanh toán tiền mặt" style="margin-left: 20px; transform: scale(2.0);" required>
                      <span class="icon"><i class="mdi mdi-cash" style="font-size: 35px; margin-left: 30px;margin-right: 10px;"></i></span>
                      <span class="text" style="font-size: 25px; font-weight: bold">Thanh toán tiền mặt</span>
                    </label>
                  </div>

                  {{-- thanh toán online --}}
                  <br><br>  
                  <span class="text" style="font-size: 30px; font-weight: bold;font-style: italic;color:#0081A7">Thanh toán online</span>
                  <div class="payment-method-group">
                    <label class="payment-method">
                      {{-- thanh toán Stripe --}}
                        <input type="radio" name="payment_method" value="Stripe" style="margin-left: 20px; transform: scale(2.0);" required>
                        <span class="icon">
                            <img src="../assets/images/stripe.png" alt="stripe" style="width: 100px; height: 100px; margin-left: 30px; margin-right: 10px;">
                        </span>

                      {{-- thanh toán Vnpay --}}
                        <input type="radio" name="payment_method" value="Vnpay" name="redirect" style="margin-left: 50px; transform: scale(2.0);" required>
                        <span class="icon">
                            <img src="../assets/images/vnpay.png" alt="Vnpay" style="width: 150px; height: 150px; margin-left: 30px; margin-right: 20px;">
                        </span>

                        {{-- thanh toán MOMO QR --}}
                        <input type="radio" name="payment_method" value="Stripe" style="margin-left: 20px; transform: scale(2.0);" required>
                        <span class="icon">
                            <img src="../assets/images/momo.png" alt="stripe" style="width: 100px; height: 100px; margin-left: 30px; margin-right: 10px;">
                        </span>
                    </label>
                  </div>
                  
                  <br><br>
                  <button type="submit" style="width: 200px" class="btn btn-success sty-btn"> Đặt tour </button>

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
  document.addEventListener("DOMContentLoaded", function() {
    var quantityInputAdult = document.getElementById("quantity-adult");
    var quantityInputChild = document.getElementById("quantity-child");
    var minusBtnAdult = document.querySelector(".adult-minus-btn");
    var minusBtnChild = document.querySelector(".child-minus-btn");
    var plusBtnAdult = document.querySelector(".adult-plus-btn");
    var plusBtnChild = document.querySelector(".child-plus-btn");
    var priceElement = document.getElementById("price");
    var totalPriceElement = document.getElementById("total-price");

    function number_format(number, decimals, decimalSeparator, thousandSeparator) {
      decimals = decimals !== undefined ? decimals : 0;
      decimalSeparator = decimalSeparator || '.';
      thousandSeparator = thousandSeparator || ',';

      var parts = number.toFixed(decimals).split('.');
      parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, thousandSeparator);

      return parts.join(decimalSeparator);
    }

    function updateTotalPrice() {
      var quantityAdult = parseInt(quantityInputAdult.value);
      var quantityChild = parseInt(quantityInputChild.value);
      var price = parseFloat(priceElement.value);
      var totalPrice = (price * quantityAdult) + (price * 0.5 * quantityChild);
      totalPriceElement.textContent = number_format(totalPrice, 0, '.', ',');
    }

    minusBtnAdult.addEventListener("click", function() {
      var currentValue = parseInt(quantityInputAdult.value);
      if (currentValue > 1) {
        quantityInputAdult.value = currentValue - 1;
        updateTotalPrice();
      }
    });

    minusBtnChild.addEventListener("click", function() {
      var currentValue = parseInt(quantityInputChild.value);
      if (currentValue > 0) {
        quantityInputChild.value = currentValue - 1;
        updateTotalPrice();
      }
    });

    plusBtnAdult.addEventListener("click", function() {
      var currentValue = parseInt(quantityInputAdult.value);
      quantityInputAdult.value = currentValue + 1;
      updateTotalPrice();
    });

    plusBtnChild.addEventListener("click", function() {
      var currentValue = parseInt(quantityInputChild.value);
      quantityInputChild.value = currentValue + 1;
      updateTotalPrice();
    });

    // Khởi tạo giá trị mặc định
    quantityInputAdult.value = "1";
    updateTotalPrice();
  });
</script>
<script src="https://js.stripe.com/v3/"></script>



@endsection
