@extends('adminlte::page')

@section('title', 'Consulta Transportistas')

@section('content_header')
    <h1 class="text-center" style="color: blue"><b>CONSULTA DE TRANSPORTISTAS</b></h1>
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
    
<div style="background: linear-gradient(rgb(223, 175, 113), rgb(253, 253, 55))" class="card">

<div class="card-header container">

    <div class="col-lg-6 col-md-6 col-sm-12">
        <form action="{{route('consutrans.index')}}" method="GET">
            <div class="row">
                <div class="col-sm-9">
                    <input type="text" name="filterValue" placeholder="Buscar por Nombre de Propietario" class="form-control rounded border-primary text-secondary"> 
                </div>
                <div>
                    <button type="submit" class="btn btn-info"><b>BUSCAR</b></button>
                </div>
            </div>
        </form>
    </div>
</div>

    <div class="card-body">
        <table id="productos" class="table table-hover table table-bordered table-sm">
            <thead style="background-color: darkblue">
                <tr style="color: rgb(247, 248, 250)" class="text-center">
                    <th>PLACAS</th>
                    <th>PROPIETARIO</th>
                    <th>TELEFONO</th>
                    <th>PILOTO</th>
                    <th>LICENCIA</th>
                    <th colspan="2" class="text-center">ACCIONES</th>
                </tr>
            </thead>

            <tbody class="text-center">
                @foreach ($consutranv as $consutran)
                <tr>
                    <td>{{$consutran->placas}}</td>
                    <td class="text-left">{{$consutran->propietario}}</td>
                    <td>{{$consutran->telefonopropietario}}</td>
                    <td class="text-left">{{$consutran->piloto}}</td>
                    <td>{{$consutran->licencia}}</td>

                    <td>
                        <a href="{{route('consutrans.edit', $consutran)}}" class="btn btn-primary btn-sm">Editar</a>
                    </td>

                    <td>
                        <form action="{{route('consutrans.destroy', $consutran)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="ELIMINAR" class="btn btn-danger btn-sm"></input>
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
            {{$consutranv->links()}}
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