@extends('adminlte::page')

@section('title', 'Boletas')

@section('content_header')
    <h1 class="text-center" style="color: blue"><b>INGRESO DE BOLETAS DE ORDENES</b></h1>
@stop

@section('content')
    
<div style="background: linear-gradient(rgb(162, 222, 224), rgb(255, 164, 131))" class="card">

    
    <div class="card-body">
        <form action="{{route('boletas.store')}}" method="POST">
            @csrf

            <div class="form-group row">
                              
                    <label for="fechaboleta" class="col-form-label text-right">Fecha de la Boleta</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="fechaboleta" name="fechaboleta" value="{{old('fechaboleta')}}">
                        @error('fechaboleta')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>        
                        @enderror
                    </div>
            </div>

        <div class="form-group row">
            <div class="col-sm-12">
                <label for="transporte_id" class="col-sm-3 col-form-label">Datos del Transporte</label>
                <select name="transporte_id" id="transporte_id" class="form-control">
                    <option value="">Seleccione Datos del Transporte</option>
                    @foreach ($transportes as $transporte)
                        <option style="color: rgb(5, 5, 196)" value="{{$transporte['id']}}">Placas: {{$transporte['placas']}} &nbsp; &nbsp; Piloto: {{$transporte['piloto']}} &nbsp; &nbsp; Licencia: {{$transporte['licencia']}}</option>
                    @endforeach
                </select>
            </div>
        </div>

          <div class="form-group row">
                <div class="col-sm-12">
                    <label for="transporte_id" class="col-sm-3 col-form-label">Datos del Consignatario</label>
                    <select name="cliente_id" id="cliente_id" class="form-control">
                    <option value="">Seleccione Datos del Consignatario</option>
                    @foreach ($clientes as $cliente)
                        <option style="color: rgb(8, 8, 209)" value="{{$cliente['id']}}">NIT: {{$cliente['nit']}} &nbsp; Nombre: {{$cliente['nombrecliente']}}  &nbsp; Direccion: {{$cliente['direcliente']}} &nbsp; Entrega: {{$cliente['direntrega']}}</option>                            
                    @endforeach
                    </select>    
                </div>              
            </div> 
            
            <div class="form-group row">
                <label for="carga" class="col-sm-2 col-form-label">No. de Contenedor</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="carga" name="carga" value="{{old('carga')}}">
                        @error('carga')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>        
                        @enderror
                    </div>

                <label for="descuento_id" class="col-sm-3 col-form-label text-right">Datos del Vale de Combustible</label>
                    <div class="col-sm-4">
                        <select name="descuento_id" id="descuento_id" class="form-control">
                        <option value="">Seleccione No. de Vale y Valor del Vale</option>
                        @foreach ($descuentos as $descuento)
                            <option style="color: rgb(8, 8, 209)" value="{{$descuento['id']}}">No.: {{$descuento['documento']}} &nbsp; &nbsp; Valor: {{$descuento['valor']}}</option>                            
                        @endforeach
                        </select>    
                    </div>
            </div>

            <div class="form-group row">
                <label for="cantidad" class="col-sm-2 col-form-label">Cantidad de Bultos</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{old('cantidad')}}">
                        @error('cantidad')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>        
                        @enderror
                    </div>
                <label for="peso" class="col-sm-1 col-form-label text-right">Peso</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="peso" name="peso" value="{{old('peso')}}">
                        @error('peso')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>        
                        @enderror
                    </div>
                <label for="poliza" class="col-sm-2 col-form-label text-right">Poliza</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="poliza" name="poliza" value="{{old('poliza')}}">
                        @error('poliza')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>        
                        @enderror
                    </div>
            </div>

<div class="form-group row">
    <label for="observaciones" class="col-sm-2 col-form-label">Observaciones</label>
        <div class="col-sm-10">
             <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{old('observaciones')}}">
             @error('observaciones')
                 <span class="text-danger">
                     <span>* Este Campo es Requerido</span>
                 </span>        
            @enderror
        </div>
</div> 

            <div class="form-group row">
                <label for="contenido" class="col-sm-2 col-form-label">Contenido</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="contenido" name="contenido" value="{{old('contenido')}}">
                        @error('contenido')
                            <span class="text-danger">
                                <span>* Este Campo es Requerido</span>
                            </span>        
                        @enderror
                    </div> 
            </div>

<br>
            <div class="text-center">
                <input type="submit" value="GUARDAR BOLETA" class="btn btn-primary">
                <a href="{{route('boletas.index')}}" class="btn btn-secondary">CANCELAR</a>
            </div>

    <div style="visibility: hidden" class="form-group row">
                <label for="tipodocumuento" class="col-sm-2 col-form-label">Tipo de Documento</label>
                    <div class="col-sm-2">
                        <select name="tipodocumento" id="tipodocumento" class="form-control">
                            <option value="0">Seleccione</option>
                            <option value="Factura">Factura</option>
                            <option value="Proforma">Proforma</option>
                        </select>
                    </div>
                <label for="factura" class="col-sm-2 col-form-label text-right">No. de Documento</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="factura" name="factura" value="{{old('factura')}}">
                    </div>
                <label for="fechafactura" class="col-sm-2 col-form-label">Fecha Documento</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="fechafactura" name="fechafactura" value="{{old('fechafactura')}}">
                    </div>
    </div>

    <div style="visibility: hidden" class="col-sm-2">
                <input type="number" class="form-control" id="valorcobro" name="valorcobro" value="0">
                @error('valorcobro')
                    <span class="text-danger">
                        <span>* Este Campo es Requerido</span>
                    </span>        
                @enderror
    </div>     
    
    <div style="visibility: hidden" class="col-sm-2">
                <input type="number" class="form-control" id="valorpago" name="valorpago" value="0">
                @error('valorpago')
                    <span class="text-danger">
                        <span>* Este Campo es Requerido</span>
                    </span>        
                @enderror
            </div>      
     
    
    <div style="visibility: hidden" class="form-group row">
        <label for="status" class="col-sm-4 col-form-label">STATUS DE LA BOLETA DE ORDEN</label>
            <select name="status" id="status" class="col-sm-2 form-control">
                <option value="Pendiente">Pendiente</option>
                <option value="Cobrada">Cobrada</option>
                <option value="Anulada">Anulada</option>
            </select>
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


@stop