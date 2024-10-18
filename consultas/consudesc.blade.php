@extends('adminlte::page')

@section('title', 'Consulta de Diesel')

@section('content_header')
    <h1 class="text-center" style="color: blue"><b>CONSULTA DE DIESEL</b></h1>
@stop

@section('content')

@if (session('success-update'))
<div class="alert alert-success text-center">
        {{session('success-update')}}
</div>
    
@elseif (session('success-delete'))
<div class="alert alert-danger text-center">
    {{session('success-delete')}}
</div>
    
@endif
    
<div  style="background: linear-gradient(rgb(223, 175, 113), rgb(253, 253, 55))" class="card">

<div class="card-header container">

    <div class="col-lg-12 col-md-12 col-sm-12">
        <form action="{{route('consudesc.index')}}" method="GET">
            <div class="form-group row">
                <div class="col-sm-3">
                    <input type="text" name="filterValue" placeholder="Buscar por Numero de Vale" class="form-control rounded border-primary text-secondary"> 
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-info"><b>BUSCAR</b></button>
                </div>
            </div>
        </form>
    </div>
</div>

    <div class="card-body">
        
        <table id="productos" class="table table-hover table table-bordered table-sm">
            <thead style="background-color: darkblue">
                <tr style="color: rgb(246, 246, 247)" class="text-center">
                    <th>FECHA</th>
                    <th>No. DE VALE</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>                                        
                    <th colspan="2" class="text-center">ACCIONES</th>
                </tr>
            </thead>

            <tbody class="text-center">
                @foreach ($consudescv as $consudesc)
                    <tr style="font-weight: bold">
                        <td>{{date('d-m-Y', strtotime($consudesc->fechadoc))}}</td>
                        <td>{{$consudesc->documento}}</td>
                        <td>{{$consudesc->unidades}}</td>
                        <td>{{$consudesc->valor}}</td>

                        <td>
                            <a href="{{route('consuldesc.edit', $consudesc)}}" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        
                        <td>
                            <form action="{{route('consuldesc.destroy', $consudesc)}}" method="POST">
                                @csrf
                                @method('DELETE')

                                <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                            </form>
                        </td> 
                    </tr>       
                @endforeach      
            </tbody>
            
        </table>

        <label for="reg">Cantidad de Registros<p id="resultado"></p></label>

        <script>
            let tablaProductos = document.getElementById('productos');
            let filas = tablaProductos.getElementsByTagName('tbody')[0];

            document.getElementById('resultado').innerText = filas.children.length;

        </script>
       
        <div class="d-flex justify-content-center">
            {{$consudescv->links()}}
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