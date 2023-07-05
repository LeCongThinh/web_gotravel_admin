@extends('layouts.app')
 
@section('title', 'Trang chủ')
 
@section('content')
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <!-- <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav> -->
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Tổng doanh thu <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">100.000.000 VND</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Thanh toán tiền mặt <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">40.000.000 VND</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Thanh toán online <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5">60.000.000 VND</h2>
                  </div>
                </div>
              </div>
            </div>
           
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh sách tour mới nhất</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Tên tour </th>
                            <th> Ảnh </th>
                            <th> Ngày khởi hành </th>
                            <th> Chi phí </th>
                            <th> Trạng thái </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                            Tham quan Nhà cổ Phùng Hưng - Tp Hội An
                            </td>
                            <td>
                              <img src="assets/images/view.jpg" class="me-2" alt="image">
                            </td>
                            <td> 30/04/2023 </td>
                            <td>
                            <label class="badge badge-gradient-warning">5.000.000 VND</label>

                            </td>
                            <td>
                              <label class="badge badge-gradient-success">HOẠT ĐỘNG</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            Tham quan Nhà cổ Phùng Hưng - Tp Hội An
                            </td>
                            <td>
                              <img src="assets/images/view.jpg" class="me-2" alt="image">
                            </td>
                            <td> 30/04/2023 </td>
                            <td>
                            <label class="badge badge-gradient-warning">5.000.000 VND</label>

                            </td>
                            <td>
                              <label class="badge badge-gradient-success">HOẠT ĐỘNG</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            Tham quan Nhà cổ Phùng Hưng - Tp Hội An
                            </td>
                            <td>
                              <img src="assets/images/view.jpg" class="me-2" alt="image">
                            </td>
                            <td> 30/04/2023 </td>
                            <td>
                            <label class="badge badge-gradient-warning">5.000.000 VND</label>

                            </td>
                            <td>
                              <label class="badge badge-gradient-success">HOẠT ĐỘNG</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            Tham quan Nhà cổ Phùng Hưng - Tp Hội An
                            </td>
                            <td>
                              <img src="assets/images/view.jpg" class="me-2" alt="image">
                            </td>
                            <td> 30/04/2023 </td>
                            <td>
                            <label class="badge badge-gradient-warning">5.000.000 VND</label>

                            </td>
                            <td>
                              <label class="badge badge-gradient-success">HOẠT ĐỘNG</label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                            Tham quan Nhà cổ Phùng Hưng - Tp Hội An
                            </td>
                            <td>
                              <img src="assets/images/view.jpg" class="me-2" alt="image">
                            </td>
                            <td> 30/04/2023 </td>
                            <td>
                            <label class="badge badge-gradient-warning">5.000.000 VND</label>

                            </td>
                            <td>
                              <label class="badge badge-gradient-success">HOẠT ĐỘNG</label>
                            </td>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection