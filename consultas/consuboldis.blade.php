@extends('adminlte::page')

@section('title', 'Informe Diesel')

@section('content_header')
    
    <div class="card-header container">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="{{route('consuboleta.create')}}" method="GET">
                <div class="form-group row">
                    <label for="fechaIni" class="col-sm-2 label-form text-right">Fecha Inicial</label>
                    <div class="col-sm-2">                        
                        <input type="date" name="fechaIni" class="form-control rounded border-primary text-secondary">
                    </div>
                    <label for="fechaFin" class="col-sm-2 label-form text-right">Fecha Final</label>
                    <div class="col-sm-2">                        
                        <input type="date" name="fechaFin" class="form-control rounded border-primary text-secondary">
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-info"><b>BUSCAR</b></button>
                        <input type="button" class="btn btn-success" onclick="javascript:window.print()" value="IMPRIMIR">

                    </div>
                </div>
            </form>
        </div>
    </div>
    
@stop

@section('content')

<div style="background: linear-gradient(lightgreen, pink)" class="card">

    <h1 class="text-center" style="color: rgb(3, 3, 126)"><b>TRANSPORTES H. R.</b></h1>
    <h1 class="text-center" style="color: rgb(3, 3, 126)"><b>REPORTE MENSUAL DE COMBUSTIBLE</b></h1>
    <br>
   
    <div class="card-body">

        <table class="table table-hover table table-bordered table-sm">
            <thead style="background-color: darkblue">
                <tr style="color: rgb(243, 241, 245)" class="text-center">
                    <th>FECHA</th>
                    <th>NOMBREL DEL PILOTO</th>
                    <th>PLACAS</th>
                    <th>VALE No.</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($consuboldisv as $consuboldis)
                    <tr style="font-weight: bold">
                        <td class="text-center">{{date('d-m-Y', strtotime($consuboldis->fechaboleta))}}</td>
                        <td>{{$consuboldis->transporte->piloto}}</td>
                        <td class="text-center">{{$consuboldis->transporte->placas}}</td>
                        <td class="text-center">{{$consuboldis->descuento->documento}}</td>
                        <td class="text-center">{{$consuboldis->descuento->unidades}}</td>
                        <td class="text-center">{{$consuboldis->descuento->valor}}</td>
                    </tr>                    
                @endforeach
            </tbody> 
        </table>
    </div>
</div>
<footer>
    <label class="col-form-label text-right">Fecha del Reporte: &nbsp;  {{strftime("%A %d de %B de %Y")}}</label>  &nbsp; &nbsp; &nbsp;
    <label >Hora {{date('H:i:s')}}</label>
</footer>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop