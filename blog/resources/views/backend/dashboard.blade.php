<!DOCTYPE html>
<html lang="en">

@include('backend.layouts.header')

<body>
<!-- Begin page -->
<div class="wrapper">


    <!-- ========== Topbar Start ========== -->
    @include('backend.layouts.topbar')
    <!-- ========== Topbar End ========== -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('backend.layouts.leftsidebar')
    <!-- ========== Left Sidebar End ========== -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    @include('backend.layouts.content')

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Theme Settings -->
@include('backend.layouts.footer')

<!-- Vendor js -->
<script src="{{url('backend/assets/js/vendor.min.js')}}"></script>

<!-- Daterangepicker js -->
<script src="{{url('backend/assets/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{url('backend/assets/vendor/daterangepicker/daterangepicker.js')}}"></script>

<!-- Apex Charts js -->
<script src="{{url('backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>

<!-- Vector Map js -->
<script src="{{url('backend/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('backend/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- Dashboard App js -->
<script src="{{url('backend/assets/js/pages/demo.dashboard.js')}}"></script>

<!-- App js -->
<script src="{{url('backend/assets/js/app.min.js')}}"></script>

</body>

</html>
