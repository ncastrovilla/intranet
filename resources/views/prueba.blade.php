@extends('layouts.index')

@section('title', 'Certificados')  

@section('contenido')

<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<form action="/prueba" method="post">
    @csrf
<input type="checkbox" id="switch" name="casa">
<label for="switch" class="lbl"></label>
<button type="submit" class="btn btn-info btn-sm"><i class="fas fa-pen"></i></button>
</form>
<style type="text/css">
    .lbl{
    display: inline-block;
    width: 65px;
    height: 33px;
    background: #979797;
    border-radius: 100px;
    cursor: pointer;
    position: relative;
    transition: .2s;
}
.lbl::after{
    content: '';
    display: block;
    width: 25px;
    height: 25px;
    background: #eee;
    border-radius: 100px;
    position: absolute;
    top: 4px;
    left: 4px;
    transition: .2s;
}
#switch:checked + .lbl::after{
    left: 36px;
}
#switch:checked + .lbl{
    background: #00C8B1;
}
#switch{
    display: none;
}
</style>

@endsection
