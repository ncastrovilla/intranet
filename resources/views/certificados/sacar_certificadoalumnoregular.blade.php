@extends('layouts.index')

@section('title', 'Certificados')  

@section('contenido')
<!-- INDEX NOTAS -->
<section class="content-header" style="background-color: skyblue;">
    <h1>
        Solicitud de Certificado
    </h1>
    <ol class="breadcrumb">
        
        <li class="active">
            Certificados
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Datos Alumno
                    </h3>
                </div>
                <!-- /.box-header -->
                <form action="/certificado" method="post" target="_blank">
                <div class="col-md-12">
                    <div class="row">
                            </br>
                            @foreach($alumno as $a)
                            @csrf
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12" style="color:#2c6aa0;font-family:Times new roman">Nombres</label>
                                    <label class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$a->nombre_alumnos}}</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12" style="color:#2c6aa0;font-family:calibri">Apellidos</label>
                                    <label class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$a->apellido_paterno.' '.$a->apellido_materno}}</label>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12" style="color:#2c6aa0;font-family:calibri">Rut</label>
                                    <label class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$a->rut}}</label>
                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-12" style="color:#2c6aa0;font-family:calibri">Curso</label>
                                    <label class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">Alumno nomas po</label>
                                </div>
                            </div>
                                                           
                    </div>

                </div>
                <div class="box-footer clearfix">

  
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Antecedentes Certificado
                    </h3>
                </div>
                <!-- /.box-header -->
                
                <div class="col-md-12">
                    <div class="row">
                            </br>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Fecha emisión</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{date('d/m/y')}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Año</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{date('Y')}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <label class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri; font-size: 25px;">Tipo</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <select class="form-control" name="tipo" required>
                                            <option value="" hidden>-- Seleccione --</option>
                                            <option value="1">Alumno Regular</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <input class="hidden" name="rut" type="text" value="{{$a->id_alumnos}}" hidden>
                            @endforeach
                                        
                    </div>
                </div>

                <div class="box-footer clearfix" >
                    <ul class="pagination pagination-sm no-margin pull-left">
                    </br>
                        <button class="btn btn-app" type="submit">
                                <i class="fa fa-save" >
                                </i>
                                Descargar
                            </button>
                    </ul>

                </div>
                </form>
            </div>
        </div>
    </div>
    
</section>
<!-- -->



@endsection
