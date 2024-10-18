@extends('adminlte::page')

@section('title', 'Reporte de Ordenes')

@section('content_header')

<div class="card-header container">

<div class="col-lg-12 col-md-12 col-sm-12">
    <form action="{{route('consuboleta.show')}}" method="GET">
    <div class="form-group row">
            <label for="filterValin" class="col-sm-2 label-form text-right">Fecha Inicial</label>
        <div class="col-sm-2">                        
            <input type="date" name="filterValin" class="form-control rounded border-primary text-secondary">
        </div>
        <label for="filterValfi" class="col-sm-2 label-form text-right">Fecha Final</label>
        <div class="col-sm-2">                        
            <input type="date" name="filterValfi" class="form-control rounded border-primary text-secondary">
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

    <h1 class="text-center" style="color: rgb(5, 5, 161)"><b>TRANSPORTES H. R.</b></h1>
    <h4 class="text-center" style="color: rgb(5, 5, 161)"><b>Santo Tomás de Castilla</b></h4> 
    <br>
        <h1 class="text-center" style="color: rgb(6, 6, 196)"><b>REPORTE MENSUAL DE VENTAS</b></h1>
        <br>        
    

    <div class="card-body">
        <table id="productos" class="table table-hover table-bordered table-sm">
            <thead style="background-color: darkblue">
                <tr style="color: rgb(249, 251, 252)" class="text-center">
                    <th>FECHA/BOL</th>
                    <th>BOLETA</th>
                    <th>CONSIGNATARIO</th>
                    <th>PRECIO/FACTU</th>
                    <th>VALOR/IVA</th>
                    <th>VALOR/FACTU</th>
                    <th>FACTURA</th>
                    <th>CONTENEDOR</th>
                    <th>PLACAS</th>
                    <th>POR/PAGAR</th>
                    <th>DIFERENCIA</th>
                </tr>
            </thead>
           
            <tbody class="text-center">
                
                @foreach ($consuordenv as $consuorden)
                <tr style="font-weight: bold">    
                    <td>{{date('d-m-Y' , strtotime ($consuorden->fechaboleta))}}</td> 

                    <td>{{$consuorden->id}}</td>

                    <td class="text-left">{{$consuorden->cliente->nombrecliente}}</td>

                    <td>@if ($consuorden['tipodocumento'] == 'Proforma') {{$consuorden->valorcobro*1}}
                        @else {{round(($consuorden->valorcobro/1.12),2) }} @endif</td> 

                    <td>@if ($consuorden['tipodocumento'] == 'Proforma') {{$consuorden->valorcobro*0}}
                        @else {{round(($consuorden->valorcobro/1.12*12/100),2)}}@endif</td>

                    <td>{{$consuorden->valorcobro}}</td>
                    <td>{{$consuorden->factura}}</td>
                    <td>{{$consuorden->carga}}</td>
                    <td>{{$consuorden->transporte->placas}} </td>
                    <td>{{$consuorden->valorpago}}</td>
                    <td>@if ($consuorden['tipodocumento'] == 'Proforma') {{round(($consuorden->valorcobro - $consuorden->valorpago),2)}}
                        @else {{round(($consuorden->valorcobro/1.12 - $consuorden->valorpago),2)}} @endif</td>

                @endforeach
                </tr>       
            </tbody>

            <tfoot>
                <tr>
                    <td style="font-size: 20px; font-weight: bold" class="text-center"  colspan="3">TOTALES</td>
                    <td style="font-size: 17px; font-weight: bold" class="text-center" id="tdTotal"></td>
                    <td style="font-size: 17px; font-weight: bold" class="text-center" id="tdTotal1"></td>
                    <td style="font-size: 17px; font-weight: bold" class="text-center" id="tdTotal2"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="font-size: 17px; font-weight: bold" class="text-center" id="tdTotal3"></td>
                    <td style="font-size: 17px; font-weight: bold" class="text-center" id="tdTotal4"></td>
                </tr>
            </tfoot>
          
        </table>
        <script>
            let tablaProductos = document.getElementById('productos');
            let filas = tablaProductos.getElementsByTagName('tbody')[0];

            document.getElementById('resultado').innerText = filas.children.length;

        </script>

        <script>
            window.addEventListener("load", function(){
                sumSueldos();
            })

                function sumSueldos(){
                    let total=0;
                    let total1=0;
                    let total2=0;
                    let total3=0;
                    let total4=0;
                    const table = document.getElementById("productos");

                    //PRIMERA FUNCION PARA SUMAR LA PRIMERA COLUMNA

                    for ( let i = 1; i < table.rows.length-1; i++ ){
                        //console.log (table.rows[i].cells[4].innerHTML);
                        let rowValue = table.rows[i].cells[3].innerHTML;
                        total = total + Number(rowValue);
                    }

                    const tdTotal = document.getElementById("tdTotal");
                    tdTotal.textContent = "Q " + " " + total;

                    //AQUI COMIENZA OTRA FUNCION PARA SUMAR OTRA COLUMNA

                    for ( let i = 1; i < table.rows.length-1; i++ ){
                        //console.log (table.rows[i].cells[4].innerHTML);
                        let rowValue = table.rows[i].cells[4].innerHTML;
                        total1 = total1 + Number(rowValue);
                    }

                   // console.log(total);

                   const tdTotal1 = document.getElementById("tdTotal1");
                    tdTotal1.textContent = "Q " + " " + total1;

                    //OTRA FUNCION PARA SUMAR OTRA COLUMNA

                    for ( let i = 1; i < table.rows.length-1; i++ ){
                        //console.log (table.rows[i].cells[4].innerHTML);
                        let rowValue = table.rows[i].cells[5].innerHTML;
                        total2 = total2 + Number(rowValue);
                    }

                   // console.log(total);

                   const tdTotal2 = document.getElementById("tdTotal2");
                    tdTotal2.textContent = "Q " + " " + total2;

                    //OTRA FUNCION PARA SUMAR OTRA COLUMNA

                    for ( let i = 1; i < table.rows.length-1; i++ ){
                        //console.log (table.rows[i].cells[4].innerHTML);
                        let rowValue = table.rows[i].cells[9].innerHTML;
                        total3 = total3 + Number(rowValue);
                    }

                   // console.log(total);

                   const tdTotal3 = document.getElementById("tdTotal3");
                   tdTotal3.textContent = "Q " + " " + total3;

                    //OTRA FUNCION PARA SUMAR OTRA COLUMNA

                    for ( let i = 1; i < table.rows.length-1; i++ ){
                        //console.log (table.rows[i].cells[4].innerHTML);
                        let rowValue = table.rows[i].cells[10].innerHTML;
                        total4 = total4 + Number(rowValue);
                    }

                   // console.log(total);

                   const tdTotal4 = document.getElementById("tdTotal4");
                    tdTotal4.textContent = "Q " + " " + parseFloat(total4).toFixed(2);
                    
                }

        </script>


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