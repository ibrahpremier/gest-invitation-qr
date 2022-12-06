<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield("title")</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome-free/css/all.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("assets/dist/css/adminlte.min.css")}}">
  <link rel="stylesheet" href="{{ asset("assets/dist/css/style.css")}}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content mt-5">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            @yield("content")
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Right sidebar</h5>
      <p>Sidebar content bla bla</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include("includes.footer")
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset("assets/plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- AdminLTE App -->

<script src="{{ asset("assets/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{ asset("assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{ asset("assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{ asset("assets/plugins/datatables-buttons/js/dataTables.buttons.min.js")}}"></script>
<script src="{{ asset("assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js")}}"></script>
<script src="{{ asset("assets/plugins/jszip/jszip.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pdfmake/pdfmake.min.js")}}"></script>
<script src="{{ asset("assets/plugins/pdfmake/vfs_fonts.js")}}"></script>
<script src="{{ asset("assets/plugins/datatables-buttons/js/buttons.html5.min.js")}}"></script>
<script src="{{ asset("assets/plugins/datatables-buttons/js/buttons.print.min.js")}}"></script>
<script src="{{ asset("assets/plugins/datatables-buttons/js/buttons.colVis.min.js")}}"></script>

<script src="{{asset("assets/dist/js/adminlte.min.js")}}"></script>
{{-- <script src="{{asset("assets/dist/js/demo.js")}}"></script> --}}
  @yield("custom_script")
</body>
</html>
