<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" type="image/png" href="/images/descarga.png"/>


  <title>Intranet EMG</title>

<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <script src="{{ asset('js/bootstrap.min.js" type="text/javascript') }}"></script>
    <script src="{{ asset('js/bootstrap.js" type="text/javascript') }}"></script>


  <!-- Custom styles for this template-->
  <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">





</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark  static-top" style="background-color: red;">
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand mr-1" href="/"><small style="font-size:14px">Enrique Molina Garmendia</small></a>



    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">

      <li class="nav-item dropdown no-arrow mx-1">
        <div class="container-fluid" style="background-color: red;padding-top:10pt;padding-bottom:10pt;">
        <a href="http://werken.ubiobio.cl" target="_blank" id="alertsDropdown" >
          <i class="fas fa-book fa-fw text-white"></i>
          <span class="badge badge-danger">WERKEN</span>
        </a>
      </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <div class="container-fluid" style="background-color: red;padding-top:10pt;padding-bottom:10pt;">
        <a href="http://mail.alumnos.ubiobio.cl" target="_blank" id="alertsDropdown" >
          <i class="fas fa-envelope fa-fw text-white"></i>
          <span class="badge badge-success">CORREO</span>
        </a>
      </div>
      </li>
      <li class="nav-item dropdown no-arrow mx-1">
        <div class="container-fluid" style="background-color: red;padding-top:10pt;padding-bottom:10pt;">
        <a href="/home" target="_blank" id="alertsDropdown" >
          <i class="fas fa-graduation-cap fa-fw text-white"></i>
          <span class="badge badge-success">PERFIL EGRESO</span>
        </a>
      </div>
      </li>



    <li class="nav-item dropdown no-arrow">
      <div class="container-fluid" style="background-color: red;padding-top:5pt;padding-bottom:5pt;">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="/misdatos">Mis datos</a>
        <div class="dropdown-divider"></div>
      </div>
    </div>
    </li>
    </ul>


  </nav>

  <div id="wrapper">

    <!-- Sidebar -->

    <ul class="sidebar navbar-nav">
      <li class="nav-item inactive">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li class="nav-item inactive">
        <a class="nav-link" href="/notas/ver">
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Notas</span>
        </a>
      </li>
      <li class="nav-item inactive">
        <a class="nav-link" href="/calendario">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Calendario de Evaluaciones</span>
        </a>
      </li>
      <li class="nav-item inactive">
        <a class="nav-link" href="/asistencia">
          <i class="fas fa-fw fa-toggle-on"></i>
          <span>Asistencia</span>
        </a>
      </li>
      <li class="nav-item inactive">
        <a class="nav-link" href="/notas/ver/curso">
          <i class="fas fa-fw fa-info-circle"></i>
          <span>Notas Alumnos</span>
        </a>
      </li>
      <li class="nav-item inactive">
        <a class="nav-link" href="/calendario/alumnos">
          <i class="fas fa-fw fa-calendar-alt"></i>
          <span>Calendario de Evaluaciones Alumnos</span>
        </a>
      </li>
      <li class="nav-item inactive">
        <a class="nav-link" href="/asistencia/alumno">
          <i class="fas fa-fw fa-toggle-on"></i>
          <span>Asistencia Alumnos</span>
        </a>
      </li>
      <li class="nav-item inactive">
        <a class="nav-link" href="/profesores">
          <i class="fas fa-chalkboard-teacher"></i>
          <span>Profesores</span>
        </a>
      </li>
      <li class="nav-item inactive">
        <a class="nav-link" href="/alumnos">
          <i class="fas fa-fw fa-toggle-on"></i>
          <span>Alumnos</span>
        </a>
      </li>
</ul>
    </ul>

    <div id="content-wrapper">
      <!-- CODIGO ACA-->



      @yield('contenido')


      <!-- CODIGO ACA-->


      <!-- Sticky Footer -->
      <footer class="sticky-footer">

        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Nicolás Castro</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Page level plugin JavaScript-->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>





</body>

</html>
