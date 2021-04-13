@extends('layouts.plantilla')

@section('title', 'Certificados')  

@section('contenido')

<?php 
    use App\Curso;
    use App\Pertenece;
?>
<!-- INDEX NOTAS -->
<div class="page-content" >
    <div class="page-header">
        <h1> Solicitud de Certificado</h1>
    </div>
    <section class="content container-fluid">
        <div class="bs-callout bs-callout-info">
            @foreach($alumno as $a)
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Datos Alumno</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
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
                                        <?php 
                                        $pertenece = Pertenece::where('año',date('Y'))->first();
                                        $curso = Curso::where('id_curso',$pertenece->id_curso)->first(); ?>
                                        <label class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$curso->grado.' '.$curso->letra}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bs-callout bs-callout-info">
            <form action="/certificado/notas/alumno" method="post" target="_blank">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Antecedentes Certificado</h3>
                            </div>
                                @csrf
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Fecha emisión</h4>
                                                <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{date('d/m/y')}}</h4>
                                            </div>
                                        </div>
                                        <?php 
                                        $años = Pertenece::where('id_alumno',$a->id_alumnos)->get();

                                        ?>
                                        <div class="col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Año</h4>
                                                <select class="form-control" name="año" required>
                                                        <option value="" hidden>-- Seleccione --</option>
                                                        @foreach($años as $año)
                                                        <option value="{{$año->año}}">{{$año->año}}</option>
                                                        @endforeach
                                                      </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-lg-6">
                                            <div class="form-group">
                                                <label class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri; font-size: 25px;">Semestre</label>
                                                <div class="col-sm-9 col-xs-12">
                                                    <select class="form-control" name="semestre" required>
                                                        <option value="" hidden>-- Seleccione --</option>
                                                        <option value="1">Primer</option>
                                                        <option value="2">Segundo</option>
                                                      </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input class="hidden" name="id" type="text" value="{{$a->id_alumnos}}" hidden>
                                    </div>
                                </div>
                            <div class="box-footer clearfix" >
                                <ul class="pagination pagination-sm no-margin pull-left">
                                    <button class="btn btn-app" type="submit">
                                        <i class="fa fa-save" ></i>
                                     Descargar</button>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </form>
        </div>
    </section>
</div>


@endsection
