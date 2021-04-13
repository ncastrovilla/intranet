@extends('layouts.plantilla')
@section('title', 'Notas Profesor')
@section('contenido')

<?php
setlocale(LC_TIME, 'es_ES.UTF-8');

 ?><br>
    <div class="page-header">
      <h3 style="color:#2c6aa0">Noticias</h3>
    </div>
    <div class="card mb-3">
    	
    </div>
    @if(auth()->user()->rol==1 || auth()->user()->rol==4)
    <div class="form-group">
    	<a type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal_crearnoticia"><i class="fas fa-plus"></i></a>
    	@include('noticias.modal_crearnoticia')
    </div>
    @endif
<div class="row">
	<div class="col offset-md-2 col-sm-8">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php 
      $e=0;
      foreach ($noticias as $m ) {
      $active= '';
        if($e == 0){
          $active = 'active';
        }
    ?>
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$e}}" class="active"></li>
    <?php
      }
     ?>
  </ol>
  <div class="card mb-2">
  <div class="carousel-inner">
    <?php
      $i=0;
      foreach ($noticias as $n){
        $active= '';
        if($i == 0){
          $active = 'active';
        }
     ?>
    <div class="carousel-item {{$active}}">
     <a  data-toggle="modal" data-target="#modal_vernoticia-{{$n->id_noticia}}">
      <img src="/Noticias/{{$n->imagen}}" style="width: 100%;"></a>
      @include('noticias.modal_vernoticia')
      <p>{{$n->descripcion_noticia}}</p>
      @if(auth()->user()->rol==1 || auth()->user()->rol==4)
      <a type="button" class="btn btn-sm btn-block btn-warning" data-toggle="modal" data-target="#modal_modificarnoticia-{{$n->id_noticia}}"><i class="fas fa-pen">
      </i></a>
      <a type="button" class="btn btn-sm btn-block btn-danger" data-toggle="modal" data-target="#modal_eliminarnoticia-{{$n->id_noticia}}"><i class="fas fa-trash">
      </i></a>
      	@include('noticias.modal_modificarnoticia')
      	@include('noticias.modal_eliminarnoticia')
      @endif
    </div>
    <?php $i++; } ?>
  </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	</div>
</div>
<script>
  $('#modal_vernoticia').on('show.bs.modal', function (e) {
  console.log("Hola") // stops modal from being shown
})
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
@endsection