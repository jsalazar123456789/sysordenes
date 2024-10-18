@extends('adminlte::page')

@section('title', 'Consulta Boletas')

@section('content_header')
    <h1 class="text-center" style="color: blue"><b>CONSULTA DE ORDENES</b></h1>
@stop

@section('content')

@if (session('success-create'))
<div class="alert alert-success text-center">
    {{session('success-create')}}
</div>
@endsession

@if (session('success-update'))
<div class="alert alert-success text-center">
    {{session('success-update')}}
</div>
    
@endif

    <div class="card-header container">
        
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form action="{{route('consuboleta.index')}}" method="GET">
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="{{route('boletas.index')}}" class="btn btn-info">CREAR NUEVA ORDEN</a>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="filterValue" placeholder="Buscar por Numero de Orden" class="form-control rounded border-primary text-secondary" >
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-info"><b>BUSCAR</b></button>
                        </div>
                    </div>
                </form>
            </div>
        
    </div>

<div style="background: linear-gradient(rgb(162, 222, 224), rgb(255, 164, 131))" class="card">
   
    <div class="card-body">
        <table id="productos" class="table table-hover table-bordered table-sm text-center">
            <thead style="background-color: darkblue">
                <tr style="color: rgb(249, 251, 252)" class="text-center">
                    <th>FECHA</th>
                    <th>BOLETA</th>
                    <th>CONSIGNATARIO</th>
                    <th>CONTENEDOR</th>
                    <th>PLACAS</th>
                    <th>VALE</th>
                    <th>UNIDAD</th>
                    <th>VALOR</th>
                    <th>STATUS</th>
                    <th class="text-center" colspan="2">ACCIONES</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($consuboleta as $consubolet)
                <tr style="font-weight: bold">    
                    <td>{{date('d-m-Y' , strtotime ($consubolet->fechaboleta))}}</td>
                    <td>{{$consubolet->id}}</td>
                    <td class="text-left">{{$consubolet->cliente->nombrecliente}}</td>
                    <td>{{$consubolet->carga}}</td>
                    <td>{{$consubolet->transporte->placas}} </td>
                    <td>{{$consubolet->descuento->documento}}</td>
                    <td>{{$consubolet->descuento->unidades}}</td>
                    <td>{{$consubolet->descuento->valor}}</td>
                    <td
                    @if($consubolet['status'] == 'Pendiente') style="background-color: rgb(241, 245, 12);"   
                        @elseif($consubolet['status'] == 'Cobrada') style="background-color: rgb(59, 230, 59);"
                        @elseif($consubolet['status'] == 'Anulada') style="background-color: rgb(223, 4, 4); color: aliceblue;"                      
                    @endif>{{$consubolet['status']}}
                </td>

                    <td>
                        <a href="{{route('consuboleta.edits', $consubolet)}}" class="btn btn-primary btn-sm">Cobrar</a>
                    </td>

                    <td>
                        <a href="{{route('consuboleta.editas', $consubolet)}}" class="btn btn-warning btn-sm" target="_blank">Imprimir</a>
                    </td>
                    
                @endforeach
            </tr>  
                
            </tbody>
            
        </table>

        <label for="reg">Cantidad de Registros<p id="resultado"></p></label>

        <script>
            let tablaProductos = document.getElementById('productos');
            let filas = tablaProductos.getElementsByTagName('tbody')[0];

            document.getElementById('resultado').innerText = filas.children.length;

        </script>
<br>

    <div class="d-flex justify-content-center">
        {{$consuboleta->links()}}
    </div>
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