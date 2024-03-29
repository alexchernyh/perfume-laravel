<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Админ-панель | @yield('title')</title>

  <link rel="apple-touch-icon" sizes="180x180" href="{{ url('') }}/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('') }}/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('') }}/favicon-16x16.png">
    <link rel="manifest" href="{{ url('') }}/site.webmanifest">
    <link rel="mask-icon" href="{{ url('') }}/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('') }}/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('') }}/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('') }}/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('') }}/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ url('') }}/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="{{ url('') }}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="{{ url('') }}/admin/plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('') }}/admin/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{ url('') }}/admin/dist/css/custom.css?ver=081122">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('') }}/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <script src="{{ url('') }}/admin/dist/js/tinymce/tinymce.min.js"></script>
  
  <link href="{{ url('') }}/admin/dist/css/colorbox.css" rel="stylesheet">

  <!-- <script src="https://cdn.tiny.cloud/1/s8g0f1m3rb125fzwqx5n6nolytjbqy377ic91m5codmn74b1/tinymce/6/plugins.min.js" referrerpolicy="origin"></script> -->

  <script src="{{ url('') }}/admin/plugins/jquery/jquery.min.js"></script>

  <script type="text/javascript" src="{{ url('') }}/admin/dist/js/jquery.colorbox-min.js"></script>
  <!-- <script type="text/javascript" src="{{ url('') }}/packages/barryvdh/elfinder/js/standalonepopup.js"></script> -->

  <!-- <script src="https://cdn.tiny.cloud/1/s8g0f1m3rb125fzwqx5n6nolytjbqy377ic91m5codmn74b1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="{{ url('') }}/admin/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="{{ url('') }}/admin/plugins/summernote/summernote-bs4.min.css"> -->
  <!-- jQuery -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <!-- <img class="animation__shake" src="{{ url('') }}/admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60"> -->
    <img class="animation__shake" src="{{ url('') }}/admin/dist/img/admin_logo.svg" alt="logo" height="60" width="60">
  </div>

   <!-- Navbar -->
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('') }}" target="_blank">Перейти на сайт</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i> Выйти
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{ url('') }}/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <!-- <img src="{{ url('') }}/admin/dist/img/admin_logo.svg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"> -->
      <span class="brand-text font-weight-light">Админ. панель</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('') }}/admin/dist/img/user5-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('homeAdmin') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Операции
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>  

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Партнеры
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('partners.index') }}" class="nav-link">
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <p>Все партнеры</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('partners.create') }}" class="nav-link">
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <p>Добавить партнера</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('partner_category.index') }}" class="nav-link">
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  <p>Категории партнеров</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Заказы
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('orders.index') }}" class="nav-link">
                  <p>Все заказы</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('orders.create') }}" class="nav-link">
                  <p>Добавить заказ</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="{{ route('pages.index') }}" class="nav-link">
              <i class="nav-icon fas fa-align-left"></i>
              <p>
                Страницы
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>

            <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('partners.index') }}" class="nav-link">
                  <p>Все партнеры</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('partners.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Добавить партнера</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('partner_category.index') }}" class="nav-link">
                  <p>Категории партнеров</p>
                </a>
              </li>
            </ul> -->

          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Настройки
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('partner_reward.index') }}" class="nav-link">
                  <p>Типы операций</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('mainpage_block.index') }}" class="nav-link">
                  <p>Главная страница</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('notify.index') }}" class="nav-link">
                  <p>Уведомления</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('options.index') }}" class="nav-link">
                  <p>Настройки сайта</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.1.0
    </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="{{ url('') }}/admin/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('') }}/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ url('') }}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="{{ url('') }}/admin/plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="{{ url('') }}/admin/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="{{ url('') }}/admin/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="{{ url('') }}/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="{{ url('') }}/admin/plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<script src="{{ url('') }}/admin/plugins/moment/moment.min.js"></script>
<!-- <script src="{{ url('') }}/admin/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ url('') }}/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<!-- <script src="{{ url('') }}/admin/plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="{{ url('') }}/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ url('') }}/admin/dist/js/adminlte.js"></script>
<script src="{{ url('') }}/admin/dist/js/jquery.maskedinput.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ url('') }}/admin/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ url('') }}/admin/dist/js/pages/dashboard.js"></script> -->
<script src="{{ url('') }}/admin/admin.js"></script>

<script type="text/javascript" src="{{ url('') }}/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
</body>
</html>
