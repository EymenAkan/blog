<!DOCTYPE html>
<html lang="en">
@include('backend.layouts.header')
<body>
<div class="wrapper">
    @include('backend.layouts.topbar')
    @include('backend.layouts.leftsidebar')
    @yield('content') <!-- BURAYI DEĞİŞTİR -->
</div>
@include('backend.layouts.footer')
<script src="{{ url('backend/assets/js/vendor.min.js') }}"></script>
<script src="{{ url('backend/assets/vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ url('backend/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ url('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ url('backend/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url('backend/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ url('backend/assets/js/pages/demo.dashboard.js') }}"></script>
<script src="{{ url('backend/assets/js/app.min.js') }}"></script>
</body>
</html>
