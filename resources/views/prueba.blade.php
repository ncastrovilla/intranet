@extends('layouts.plantilla')
@section('contenido')
<style type="text/css">
    #menu * { list-style:none;}
#menu li{ line-height:180%;}
#menu li a{color:#222; text-decoration:none;}
#menu li a:before{ content:"\025b8"; color:#ddd; margin-right:4px;}
#menu input[name="list"] {
    position: absolute;
    left: -1000em;
    }
#menu label:before{ content:"\025b8"; margin-right:4px;}
#menu input:checked ~ label:before{ content:"\025be";}
#menu .interior{display: none;}
#menu input:checked ~ ul{display:block;}
</style>
<ul id="menu">
   <li><input type="checkbox" name="list" id="nivel1-1"><label for="nivel1-1">Nivel 1</label>
   <ul class="interior">
         <li><input type="checkbox" name="list" id="nivel2-1"><label for="nivel2-1">Nivel 2</label>
           <ul class="interior">
             <li><a href="#r">Nivel 3</a></li>
             <li><a href="#r">Nivel 3</a></li>
            </ul>
         </li>
         <li><input type="checkbox" name="list" id="nivel2-2"><label for="nivel2-2">Nivel 2</label>
           <ul class="interior">
             <li><a href="#r">Nivel 3</a></li>
             <li><a href="#r">Nivel 3</a></li>
             <li><a href="#r">Nivel 3</a></li>
             <li><a href="#r">Nivel 3</a></li>
            </ul>
         </li>
         <li><a href="#r">Nivel 2</a></li>
      </ul>
   </li>
   <li><input type="checkbox" name="list" id="nivel1-2" checked=""><label for="nivel1-2">Nivel 1</label>
      <ul class="interior">
         <li><a href="#r">Nivel 2</a></li>
         <li><input type="checkbox" name="list" id="nivel2-3"><label for="nivel2-3">Nivel 2</label>
           <ul class="interior">
             <li><a href="#r">Nivel 3</a></li>
             <li><a href="#r">Nivel 3</a></li>
            </ul>
         </li>
         <li><input type="checkbox" name="list" id="nivel2-4"><label for="nivel2-4">Nivel 2</label>
         <ul class="interior">
             <li><a href="#r">Nivel 3</a></li>
             <li><a href="#r">Nivel 3</a></li>
             <li><a href="#r">Nivel 3</a></li>
            </ul>
         </li>
      </ul>
   </li>
   <li><a href="#r">Nivel 1</a></li>
</ul>

@endsection