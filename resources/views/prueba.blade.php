<?php
use App\Calendario;
use App\Curso;
use App\Nota;
?>

@extends('layouts.plantilla')

@section('title', 'Hola')  

@section('contenido')
<!-- INDEX NOTAS -->

<section class="content-header">
    <h1>
        
        <small>
            Ceisp
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="fa fa-home">
                </i>
                Inicio
            </a>
        </li>
        <li>
            @if(auth()->user()->rol == '3')
            <a href="{{ url('/mis-asignaturas') }}">
                Mis asignaturas
            </a>
            @else
            <a href="{{ url('/cursos/detalle') }}">
                
            </a>
            @endif
        </li>
        <li class="active">
            
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Notas Alumnos</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Calendario Curso</a></li>
                                <!-- <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                         Dropdown <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                        <li role="presentation" class="divider"></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                    </ul>
                                </li>
                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                            </ul>
                             <!-- DETALLE CURSO -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">               
                                    <div>
                                        <!-- /.box-header -->
                                        <div class="col-md-9">
                                            <div class="box-body table-responsive">
                                                <div class="scrollable">
                                                    <table class="table table-bordered table-striped" id="my-table">
                                                        <tr>
                                                            <th>
                                                                Nombre
                                                            </th>
                                                            <th>
                                                                Rut
                                                            </th>
                                                            <th style="width: 70px">
                                                                1
                                                            </th>
                                                            <th style="width: 70px">
                                                                2
                                                            </th>
                                                            <th style="width: 70px">
                                                                3
                                                            </th>
                                                            <th style="width: 70px">
                                                                4
                                                            </th>
                                                            <th style="width: 70px">
                                                                5
                                                            </th>
                                                            <th style="width: 70px">
                                                                6
                                                            </th>
                                                            <th style="width: 70px">
                                                                7
                                                            </th>
                                                            <th style="width: 70px">
                                                                8
                                                            </th>
                                                            <th style="width: 70px">
                                                                9
                                                            </th>
                                                            <th style="width: 70px">
                                                                10
                                                            </th>
                                                            <th style="width: 70px">
                                                                Promedio
                                                            </th>
                                                        </tr>
                                                       
                                                        <tr>
                                                            <td>
                                                                
                                                            </td>
                                                            <td>
                                                                
                                                            </td>
                                                            

                                                            
                                                        </tr>
                                                        
                                                    </table>
                                                    <div class="form-group has-warning">
                                                        <div class="pull-right">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                <th width=68%>
                                                                    Promedio General Curso
                                                                </th>
                                                   
                                                                    
                                                  
                                        
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        
                                                        <span class="help-block"><i class="fa fa-exclamation-circle"></i> Las notas pendientes al momento de calcular promedios se consideran como '0.0' </span> 

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <h1>
                                                Detalle evaluación
                                            </h1>
                                            <ul class="list-group">
                                              
                                                <li class="list-group-item">

                                                    <b>.</b>
                                                   
                                                    <!-- ESTE IF ES PARA SABER SI EL QUE ESTÁ EN ESTA VISTA, ES REALMENTE EL PROFESOR QUE IMPARTE ESTA ASIGNATURA (EJEMPLO, PROFESOR JEFE QUE REVISA ASIGNATURA) -->
                                                    
                                                    <div class="pull-right"><button type="button" class="btn btn-xs btn-flat"  data-target="#editdescripcionmodal" data-toggle="modal"><i class="fa fa-pencil"></i></button></div>
                                                
                                                </li>
                                
                                              
                                            </ul>
                                        </div>
                                        <div class="box-footer clearfix">
                                            <ul class="pagination pagination-sm no-margin pull-left">
                                                
                                               
                                               
                                                
                                            </ul>
                                            <ul class="pagination pagination-sm no-margin pull-right">
                                            </ul>
                                        </div>
                                    </div>
                                                                 
                                </div>
                                <!-- /.tab-pane -->

                                <!-- CALENDARIO -->
                            
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
           
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->   
                </div>

</section>

<!-- -->

@endsection


