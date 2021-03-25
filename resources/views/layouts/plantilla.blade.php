<?php
      use App\Alumnos;
      use App\Profesor;
      use App\Curso;
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="/images/descarga.png"/>
  <title>Intranet</title>
  <!-- Google Font: Source Sans Pro -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../adminlte/plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="../adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminlte/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
    <!-- Left navbar links -->
      <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
      <li class="nav-item dropdown no-arrow">
      <div class="container-fluid">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle fa-fw"></i>
        {{auth()->user()->name}}
      </a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        @if(auth()->user()->rol==3)
        <?php
      $alumnos = Alumnos::where('rut',auth()->user()->rut)->first();
      $curso = Curso::where('id_curso',$alumnos->id_curso)->first();
       ?>
        <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{auth()->user()->name}}</h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../images/descarga.png" alt="User Avatar">
              </div>
              
              <div class="card-footer" style="float: right;">
                <div class="row">
                  <div class="">
                    <label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Curso {{$curso->grado.' '.$curso->letra}}</label><br>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar Sesion') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
              </div>
              </div>
            </div>
        @endif
        @if(auth()->user()->rol==2)
        <?php
      $alumnos = Profesor::where('rut',auth()->user()->rut)->first();
      $curso = Curso::where('id_curso',$alumnos->id_profesor)->first();
       ?>
        <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{auth()->user()->name}}</h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-1" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <div class="card-footer" style="float: right;">
                
                <!-- /.row -->
        <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar Sesion') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
              </div>
            </div>
        @endif
        @if(auth()->user()->rol==1)
        <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{auth()->user()->name}}</h3>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-1" src="../images/Nicolas-WIN_20181016_165625.jpg" alt="User Avatar">
              </div>
              <div class="card-footer" style="float: right;">
                <div class="row">
                  <div class="">
                    <label>Administrador</label><br>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
        <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Cerrar Sesion') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
              </div>
            </div>
        @endif
      </div>
    </div>
    </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4 sidebar-no-expand">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="../images/descarga.png" alt="adminlte Logo" class="brand-image" style="opacity: .8">
      <p class="brand-text font-weight-light">EMG</p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          @if(auth()->user()->rol==2)
      <li class="nav-item">
        <a class="nav-link" href="/asistencia">
          <i class="nav-icon fas fa-toggle-on"></i>
          <p>Asignaturas</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/calendario">
          <i class="nav-icon fas fa-calendar-alt"></i>
          <p>Calendario</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/material">
          <i class="nav-icon fas fa-folder"></i>
          <p>Documentos</p>
        </a>
      </li>
      @endif
      @if(auth()->user()->rol==3)
      <li class="nav-item">
        <a class="nav-link" href="/notas/alumno">
          <i class="nav-icon fas fa-book"></i>
          <p>Asignaturas</p>
        </a>
      </li>
      <li class="nav-item">
                  <a class="nav-link" href="/calendario/alumnos">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>Calendario</p>
                  </a>
                </li>
      <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Certificados
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a class="nav-link" href="/certificado/alumnoregular">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>Cert. Alumno Regular</p>
                </a>
              </li>
               <li class="nav-item">
                  <a class="nav-link" href="/certificado/notas">
                    <i class="nav-icon fas fa-info-circle"></i>
                    <p>Cert. Notas</p>
                  </a>
                </li>
            </ul>
          </li>
      @endif
      @if(auth()->user()->rol==1)
      <li class="nav-item">
        <a class="nav-link" href="/profesores">
          <i class="nav-icon fas fa-chalkboard-teacher"></i>
          <p>Profesores</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/alumnos">
          <i class="nav-icon fas fa-user"></i>
          <p>Alumnos</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/administradores">
         <i class="nav-icon fas fa-user-cog"></i>
          <p>Administradores</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/administrativos">
          <i class="nav-icon fas fa-user-tie"></i>
          <p>Administrativos</p>
        </a>
      </li>
      @endif
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <br>
    <div class="page-content">  
    @yield('contenido')
    </div>
  </div>

<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../adminlte/plugins/jszip/jszip.min.js"></script>
<script src="../adminlte/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../adminlte/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../adminlte/plugins/jquery/jquery.min.js"></script>
<!-- adminlte App -->
<script src="../adminlte/dist/js/adminlte.min.js"></script>
<!-- adminlte for demo purposes -->
<script src="../adminlte/dist/js/demo.js"></script>
    <!-- Main content -->
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 0.5
    </div>
    <strong>Copyright &copy; Nicolas Castro.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

</body>
</html>
<style type="text/css">
  .bs-callout {
    background-color: white;
    padding: 20px;
    margin: 20px 0;
    border: 1px solid #eee;
    border-top-width: 5px;
    border-radius: 3px;
}
.bs-callout h4 {
    margin-top: 0;
    margin-bottom: 5px;
}
.bs-callout p:last-child {
    margin-bottom: 0;
}
.bs-callout code {
    border-radius: 3px;
}
.bs-callout+.bs-callout {
    margin-top: -5px;
}
.bs-callout-default {
    border-top-color: #777;
}
.bs-callout-default h4 {
    color: #777;
}
.bs-callout-primary {
    border-top-color: #428bca;
}
.bs-callout-primary h4 {
    color: #428bca;
}
.bs-callout-success {
    border-top-color: #5cb85c;
}
.bs-callout-success h4 {
    color: #5cb85c;
}
.bs-callout-danger {
    border-top-color: #d9534f;
}
.bs-callout-danger h4 {
    color: #d9534f;
}
.bs-callout-warning {
    border-top-color: #f0ad4e;
}
.bs-callout-warning h4 {
    color: #f0ad4e;
}
.bs-callout-info {
    border-top-color: #5bc0de;
}
.bs-callout-info h4 {
    color: #5bc0de;
}
.page-content {
    background-color: #fff;
    position: relative;
    margin: 0;
    padding: 8px 20px 24px;
}
.page-header{
  border-bottom: 1px groove;
}
</style>
