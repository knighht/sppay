<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>SPPay - @yield('title')</title>

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
  <link href="{{ asset('css/jr-main.css') }}" rel="stylesheet">

  <!-- Custom styles for datatables-->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.css"/>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav jr-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon">
          <i class="fas fa-hand-holding-usd"></i>
        </div>
        <div class="sidebar-brand-text mx-3" style="text-transform: none; font-weight: normal;"><b>SPP</b>ay</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link jr-accent-fade" href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dasbor</span></a>
      </li>

      <!-- Nav Item - Payment -->
      <li class="nav-item {{ Route::is('payment') ? 'active' : '' }}">
        <a class="nav-link jr-accent-fade" href="{{ route('payment') }}">
          <i class="fas fa-fw fa-money-bill-wave"></i>
          <span>Pembayaran</span></a>
      </li>

      <!-- Nav Item - User Management Menu -->
      <li class="nav-item {{ Route::is('student') || Route::is('student.detail') ? 'active' : '' }}"">
        <a class="nav-link {{ Route::is('student') || Route::is('student.detail') || Route::is('user') ? '' : 'collapsed' }} jr-accent-fade" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
          <i class="fas fa-fw fa-user-cog"></i>
          <span>Manajemen Pengguna</span>
        </a>
        <div id="collapseUser" class="collapse {{ Route::is('student') || Route::is('user') ? 'show' : '' }}" aria-labelledby="headingUser" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::is('student') || Route::is('student.detail') ? 'active' : '' }}" href="{{ route('student') }}">Siswa</a>
            <a class="collapse-item {{ Request::is('pengguna/petugas') ? 'active' : '' }}" href="{{ url('pengguna/petugas') }}">Petugas</a>
            <a class="collapse-item {{ Request::is('pengguna/admin') ? 'active' : '' }}" href="{{ url('pengguna/admin') }}">Admin</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ Route::is('spp') || Route::is('class') ? 'active' : '' }}">
        <a class="nav-link {{ Route::is('spp') || Route::is('class') ? '' : 'collapsed' }} jr-accent-fade" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Route::is('spp') || Route::is('class') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item {{ Route::is('spp') ? 'active' : '' }}" href="{{ route('spp') }}">SPP</a>
            <a class="collapse-item {{ Route::is('class') ? 'active' : '' }}" href="{{ route('class') }}">Kelas</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline mb-auto">
        <button class="rounded-circle border-0 jr-accent" id="sidebarToggle" onclick="setSideBarColapsed()"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ Avatar::create(Auth::user()->name)->toBase64() }}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        @yield('content')

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Hak Cipta &copy; SPPay {{ date('Y') }}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Siap Untuk Pergi?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-primary jr-accent" href="{{ route('logout') }}"
            onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Keluar</a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <!-- DataTables-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-html5-1.6.1/b-print-1.6.1/datatables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"
    integrity="sha256-yE5LLp5HSQ/z+hJeCqkz9hdjNkk1jaiGG0tDCraumnA=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.11/dist/sweetalert2.all.min.js"></script>
  <script src="{{ asset('js/jquery.number.js') }}"></script>
  
  <!-- App scripts -->
  <script  type="text/javascript">
    function setSideBarColapsed() {
      if (localStorage.getItem("sideBarColapsed") == "true") {
        localStorage.setItem("sideBarColapsed", "false");
        @if(Route::is('student') || Request::is('pengguna/admin') || Request::is('pengguna/petugas'))
        document.getElementById("collapseUser").classList.add("show");
        @endif
      } else {
        localStorage.setItem("sideBarColapsed", "true");
        document.getElementById("collapseUser").classList.remove("show");
      }

      if (localStorage.getItem("sideBarColapsed2") == "true") {
        localStorage.setItem("sideBarColapsed2", "false");
        @if(Route::is('spp') || Route::is('class'))
        document.getElementById("collapseTwo").classList.add("show");
        @endif
      } else {
        localStorage.setItem("sideBarColapsed2", "true");
        document.getElementById("collapseTwo").classList.remove("show");
      }
    }

    $(document).ready( function () {
      if (localStorage.getItem("sideBarColapsed") == "true") {
        document.getElementById("accordionSidebar").classList.add("toggled");
        document.getElementById("collapseUser").classList.remove("show");
      } else {
        @if(Route::is('student') || Route::is('student.detail') || Request::is('pengguna/admin') || Request::is('pengguna/petugas'))
        document.getElementById("collapseUser").classList.add("show");
        @endif
      }
      if (localStorage.getItem("sideBarColapsed2") == "true") {
        document.getElementById("accordionSidebar").classList.add("toggled");
        document.getElementById("collapseTwo").classList.remove("show");
      } else {
        @if(Route::is('spp') || Route::is('class'))
        document.getElementById("collapseTwo").classList.add("show");
        @endif
      }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  </script>
  @stack('scripts')

</body>

</html>
