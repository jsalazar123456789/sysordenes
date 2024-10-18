@extends('adminlte::page')

@section('title', 'Editar Transportistas')

@section('content_header')
    <h1 style="color: rgb(4, 4, 170)" class="text-center" ><b>EDITAR TRANSPORTISTAS</b></h1>
@stop

@section('content')
<div class="card">    
    <div class="card-body">
        <form action="{{route('consutrans.update', $consutran)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label class="col-sm-1 col-form-label" for="placas">PLACAS</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="placas" name="placas" value="{{$consutran->placas}}">
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
                        <input type="text" class="form-control" id="propietario" name="propietario" value="{{$consutran->propietario}}">

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
                        <input type="text" class="form-control" id="direpropietario" name="direpropietario" value="{{$consutran->direpropietario}}">

                        @error('direpropietario')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="telefonopropietario">Telefono del Propietario</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="telefonopropietario" name="telefonopropietario" value="{{$consutran->telefonopropietario}}">

                        @error('telefonopropietario')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="fechaingreso">Fecha de Ingreso</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="fechaingreso" name="fechaingreso" value="{{$consutran->fechaingreso}}">

                        @error('fechaingreso')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
                <label class="col-sm-2 col-form-label text-right" for="piloto">Piloto</label>    
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="piloto" name="piloto" value="{{$consutran->piloto}}">

                        @error('piloto')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
                    </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label" for="licencia">Licencia</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="licencia" name="licencia" value="{{$consutran->licencia}}">

                        @error('licencia')
                        <span class="text-danger">
                            <span>* Este Campo es Requerido</span>
                        </span>        
                    @enderror
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