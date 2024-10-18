@extends('adminlte::page')

@section('title', 'Transportistas')

@section('content_header')
    <h1 style="color: rgb(3, 3, 204)" class="text-center"><b>INGRESO DE TRANSPORTISTAS</b></h1>
@stop

@section('content')

@if (session('success-create'))
    <div class="alert alert-success text-center">
        {{session('success-create')}}
    </div>
    
@endsession
    
<div style="background: linear-gradient(rgb(162, 222, 224), rgb(255, 164, 131))" class="card">
    <div class="card-body">
        <form action="{{route('transportes.store')}}" method="POST">
            @csrf

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="placas">Numero de Placas</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="placas" name="placas" value="{{old('placas')}}">

                        @error('placas')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>
                        @enderror
                        
                    </div>
                   
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="propietario">Nombre del Propietario</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="propietario" name="propietario" value="{{old('propietario')}}">

                        @error('propietario')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>     
                        @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="direpropietario">Direccion del Propietario</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="direpropietario" name="direpropietario" value="{{old('direpropietario')}}">

                        @error('direpropietario')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>                            
                        @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="telefonopropietario">Telefono del Propietario</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="telefonopropietario" name="telefonopropietario" value="{{old('telefonopropietario')}}">

                        @error('telefonopropietario')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>                            
                        @enderror
                    </div>

                    <label class="col-sm-2 col-form-label text-right" for="fechaingreso">Fecha de Ingreso</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="fechaingreso" name="fechaingreso" value="{{old('fechaingreso')}}">
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="piloto">Nombre del Piloto</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="piloto" name="piloto" value="{{old('piloto')}}">

                        @error('piloto')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>                            
                        @enderror
                    </div>

                    <label class="col-sm-1 col-form-label text-right" for="licencia">Licencia</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="licencia" name="licencia" value="{{old('licencia')}}">

                        @error('licencia')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>                            
                        @enderror
                    </div>
            </div>
<br>
            <div class="text-center">
                <input type="submit" value="GUARDAR REGISTRO" class="btn btn-primary">
                <a href="{{route('transportes.index')}}" class="btn btn-secondary">CANCELAR</a>
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