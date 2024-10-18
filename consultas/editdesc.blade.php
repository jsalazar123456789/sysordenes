@extends('adminlte::page')

@section('title', 'Editar Vales')

@section('content_header')
    <h1 class="text-center" style="color: rgb(3, 3, 179)"><b>MODIFICAR VALES DE DESCUENTOS</b></h1>
@stop

@section('content')

@if (session('success-create'))
    <div class="alert alert-success text-center">
        {{session('success-create')}}
    </div> 
@endsession
    
<div class="card">    
<div class="card-body">
        <form action="{{route('consuldesc.update', $consudesc)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label class="col-sm-2.8 col-form-label" for="documento">Numero de Documento</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="documento" name="documento" value="{{$consudesc->documento}}">
                    </div>

                    <label class="col-sm-2 col-form-label" for="fechadoc">Fecha del Documento</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="fechadoc" name="fechadoc" value="{{$consudesc->fechadoc}}">
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="unidades">Cantidad Unidades</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="unidades" name="unidades" value="{{$consudesc->unidades}}">
                    </div>

                    <label class="col-sm-2 col-form-label" for="valor">Valor en Quetzales</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="valor" name="valor" value="{{$consudesc->valor}}">
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="concepto">Concepto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="concepto" name="concepto" value="{{$consudesc->concepto}}">
                    </div>
            </div>
<br>
            <div class="text-center">
                <input type="submit" value="MODIFICAR REGISTRO" class="btn btn-primary">
                <a href="{{route('consudesc.index')}}" class="btn btn-secondary">CANCELAR</a>
            </div>

        </form>
    </div>
</div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
