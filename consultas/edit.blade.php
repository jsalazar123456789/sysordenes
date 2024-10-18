@extends('adminlte::page')

@section('title', 'Editar Consignatarios')

@section('content_header')
    <h1 style="color: rgb(42, 6, 201)" class="text-center"><b>MODIFICAR CONSIGNATARIOS</b></h1>
@stop

@section('content')


<div class="card">    
    <div class="card-body">
        <form action="{{route('consucliente.update', $concliente)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nit">NIT</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nit" name="nit" value="{{$concliente->nit}}">
                        @error('nit')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>        
                        @enderror

                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="nombrecliente">Nombre del Consignatario</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nombrecliente" name="nombrecliente" value="{{$concliente->nombrecliente}}">

                        @error('nombrecliente')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="direcliente">Direccion del Consignatario</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direcliente" name="direcliente" value="{{$concliente->direcliente}}">

                        @error('direcliente')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="direntrega">Direccion de Entrega</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direntrega" name="direntrega" value="{{$concliente->direntrega}}">

                        @error('direntrega')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="telefono">Numero de Telefono</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$concliente->telefono}}">

                        @error('telefono')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
                <label class="col-sm-2 col-form-label text-right" for="celular">Numero de Celular</label>    
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="celular" name="celular" value="{{$concliente->celular}}">

                        @error('celular')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="contacto">Persona de Contacto</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="contacto" name="contacto" value="{{$concliente->contacto}}">

                        @error('contacto')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
                <label class="col-sm-2 col-form-label text-right" for="fechaingreso">Fecha de Ingreso</label>    
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="fechaingreso" name="fechaingreso" value="{{$concliente->fechaingreso}}">
                    </div>
            </div>
<br>
            <div class="text-center">
                <input type="submit" value="MODIFICAR REGISTRO" class="btn btn-primary">
                <a href="{{route('inicio')}}" class="btn btn-secondary">CANCELAR</a>
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