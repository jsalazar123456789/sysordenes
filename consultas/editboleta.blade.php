@extends('adminlte::page')

@section('title', 'Cobrar Boletas')

@section('content_header')
    <h1 class="text-center" style="color: blue"><b>COBRO DE BOLETAS DE ORDENES</b></h1>
@stop

@section('content')

@if (session('success-create'))
<div class="alert alert-success text-center">
    {{session('success-create')}}
</div>
@endsession
    
<div class="card">
<div class="card-body">
        <form action="{{route('consuboleta.update', $consubolet)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group row">
                <label for="orden" class="col-sm-2 col-form-label">Numero de Orden</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="orden" name="orden" value="{{$consubolet->id}}">
                    </div>

                    <label for="fechaboleta" class="col-sm-4 col-form-label text-right">Fecha de la Boleta</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" id="fechaboleta" name="fechaboleta" value="{{$consubolet->fechaboleta}}">
                    </div>
            </div>


            <div class="form-group row">
                <label for="transporte_id" class="col-sm-1 col-form-label">Piloto</label>   
                    <div class="col-sm-4">  
                        <input type="text" class="form-control" id="transporte_id" name="transporte_id" value="{{$consubolet->transporte->piloto}}" disabled>           
                    </div>
                <label for="transporte_id" class="col-sm-1 col-form-label text-right">Placas</label>  
                    <div class="col-sm-2">  
                        <input type="text" class="form-control" id="placas" name="placas" value="{{$consubolet->transporte->placas}}" disabled>           
                    </div>
                <label for="transporte_id" class="col-sm-1 col-form-label">Licencia</label>  
                    <div class="col-sm-2">  
                        <input type="text" class="form-control" id="licencia" name="licencia" value="{{$consubolet->transporte->licencia}}" disabled>           
                    </div>
            </div>

            <div class="form-group row">
                <label for="cliente_id" class="col-sm-1 col-form-label">Cliente</label>   
                    <div class="col-sm-4">  
                        <input type="text" class="form-control" id="cliente_id" name="cliente_id" value="{{$consubolet->cliente->nombrecliente}}" disabled>           
                    </div>
                <label for="direccion" class="col-sm-1 col-form-label text-right">Direccion</label>  
                    <div class="col-sm-6">  
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{$consubolet->cliente->direcliente}}" disabled>           
                    </div>
            </div>

            <div class="form-group row">
                <label for="entrega" class="col-sm-1 col-form-label">Entrega</label>   
                    <div class="col-sm-7">  
                        <input type="text" class="form-control" id="direntrega" name="direntrega" value="{{$consubolet->cliente->direntrega}}" disabled>           
                    </div>
                <label for="carga" class="col-sm-2 col-form-label text-right">No. de Contenedor</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="carga" name="carga" value="{{$consubolet->carga}}">
                    </div> 
            </div>

            <div class="form-group row">
                <label for="cantidad" class="col-sm-2 col-form-label">Cantidad de Bultos</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{$consubolet->cantidad}}">
                    </div>
                <label for="peso" class="col-sm-1 col-form-label text-right">Peso</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="peso" name="peso" value="{{$consubolet->peso}}">
                    </div>
                <label for="poliza" class="col-sm-2 col-form-label text-right">Poliza</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" id="poliza" name="poliza" value="{{$consubolet->poliza}}">
                    </div>
            </div>

            <div class="form-group row">
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
                        <input type="number" class="form-control" id="factura" name="factura" value="{{$consubolet->factura}}">
                    </div>
                <label for="fechafactura" class="col-sm-2 col-form-label">Fecha Documento</label>
                    <div class="col-sm-2">
                        <input type="date" class="form-control" id="fechafactura" name="fechafactura" value="{{$consubolet->fechafactura}}">
                    </div>
            </div>

            <div class="form-group row">
                <label for="contenido" class="col-sm-2 col-form-label">Contenido</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="contenido" name="contenido" value="{{$consubolet->contenido}}"> 
                    </div> 
                <label for="valorcobro" class="col-sm-2 col-form-label">VALOR A COBRAR &nbsp; Q</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="valorcobro" name="valorcobro" value="{{$consubolet->valorcobro}}">
                    </div>          
            </div>

            <div class="form-group row">
                <label for="observaciones" class="col-sm-2 col-form-label">Observaciones</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="observaciones" name="observaciones" value="{{$consubolet->observaciones}}">
                    </div>
                <label for="valorpago" class="col-sm-2 col-form-label">VALOR A PAGAR &nbsp; &nbsp; &nbsp; Q</label>
                    <div class="col-sm-2">
                        <input type="number" class="form-control" id="valorpago" name="valorpago" value="{{$consubolet->valorpago}}">
                    </div>      
            </div> 
            
            <div style="justify-content: center" class="form-group row">                
            <label for="descuento_id" class="col-sm-2 col-form-label text-right">Vale de Combustible</label>    
            <div class="col-sm-4">
                <select name="descuento_id" id="descuento_id" class="form-control" required>
                    <option value="">Seleccione No. de Vale y Valor del Vale </option>
                    @foreach ($descuentos as $descuento)
                        <option style="color: rgb(8, 8, 209)" value="{{$descuento['id']}}">No.: {{$descuento['documento']}} &nbsp; &nbsp; Valor: {{$descuento['valor']}}</option>                            
                    @endforeach
                </select>
            </div>    

                <label for="status" class="col-sm-3 col-form-label">STATUS DE LA BOLETA DE ORDEN</label>
                    <select name="status" id="status" class="col-sm-2 form-control">
                        <option value="Pendiente">Pendiente</option>
                        <option value="Cobrada">Cobrada</option>
                        <option value="Anulada">Anulada</option>
                    </select>
            </div>
<br>
            <div class="text-center">
                <input type="submit" value="GUARDAR TRANSACCION" class="btn btn-primary">
                <a href="{{route('consuboleta.index')}}" class="btn btn-secondary">CANCELAR</a>
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