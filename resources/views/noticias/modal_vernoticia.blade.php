<?php 
  setlocale(LC_TIME, 'es_CL.UTF-8');

?>
<div class="modal fade bd-example-modal-lg" data-backdrop="static" id="modal_vernoticia-{{$n->id_noticia}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" align="center">
                    Noticia
                </h4>
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
              @csrf
              <div class="modal-body">
                <span>Publicado el {{strftime("%A, %d de %B de %Y", strtotime($n->fecha_noticia))}}</span><br><br>
                <div class="box-body">
                    <h5 style="color: darkblue;">{{$n->descripcion_noticia}}</h5><br>
                    <img src="/Noticias/{{$n->imagen}}" style="width: 100%;"><br><br>
                    <strong>{{$n->cuerpo_noticia}}</strong>
              </div>
            </div>
              <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Cerrar</button>
              </div>
        </div>
    </div>
</div>