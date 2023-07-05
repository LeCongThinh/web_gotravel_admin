<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}

    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <style type="text/css">
        .ck-editor__editable_inline
        {
            height: 700px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      
        <!-- partial view: navbar.blade.php -->
        @include('layouts.navbar')
        
      <div class="container-fluid page-body-wrapper">

        <!-- partial view: sidebar.blade.php -->
        @include('layouts.sidebar')
       
        <!-- partial content-->
        <div class="main-panel">
          
            @yield('content')
        </div>

        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
      <footer class="footer">
            <div class="container-fluid d-flex justify-content-center">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block"><h4>Copyright © GoTravel.com 2023</h4></span>
            </div>
        </footer>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/js/off-canvas.js"></script>
    <script src="/assets/js/hoverable-collapse.js"></script>
    <script src="/assets/js/misc.js"></script>

    
   

    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="/assets/js/dashboard.js"></script>
    <script src="/assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    
  
  </body>
</html>