@extends('adminlte::page')

@section('title', 'Consignatarios')

@section('content_header')
    <h1 style="color: rgb(42, 6, 201)" class="text-center"><b>INGRESO DE CONSIGNATARIOS</b></h1>
@stop

@section('content')

@if (session('success-create'))
<div class="alert alert-success text-center">
    {{session('success-create')}}

</div>

@endsession


<div style="background: linear-gradient(rgb(162, 222, 224), rgb(255, 164, 131))" class="card">    
    <div class="card-body">
        <form action="{{route('clientes.store')}}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="nit">NIT</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="nit" name="nit" value="{{old('nit')}}">
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
                        <input type="text" class="form-control" id="nombrecliente" name="nombrecliente" value="{{old('nombrecliente')}}">

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
                        <input type="text" class="form-control" id="direcliente" name="direcliente" value="{{old('direcliente')}}">

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
                        <input type="text" class="form-control" id="direntrega" name="direntrega" value="{{old('direntrega')}}">

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
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{old('telefono')}}">

                        @error('telefono')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
                <label class="col-sm-2 col-form-label text-right" for="celular">Numero de Celular</label>    
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="celular" name="celular" value="{{old('celular')}}">

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
                        <input type="text" class="form-control" id="contacto" name="contacto" value="{{old('contacto')}}">

                        @error('contacto')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
                <label class="col-sm-2 col-form-label text-right" for="fechaingreso">Fecha de Ingreso</label>    
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="fechaingreso" name="fechaingreso" value="{{old('fechaingreso')}}">
                        @error('fechaingreso')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
            </div>
<br>
            <div class="text-center">
                <input type="submit" value="GUARDAR REGISTRO" class="btn btn-primary">
                <a href="{{route('clientes.index')}}" class="btn btn-secondary">CANCELAR</a>
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