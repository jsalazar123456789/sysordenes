@extends('adminlte::page')

@section('title', 'Boleta de Pago')

@section('content_header')
    
    <div class="card-header container">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form action="{{route('consuboleta.edit', $consuplacav)}}" method="GET">
                <div class="form-group row">
                    <div class="col-sm-2">
                        <input type="text" name="filterPlaca" placeholder="Ingrese No. Placas" class="form-control rounded border-primary text-secondary">
                    </div>
                    <label for="fechaValini" class="col-sm-3 label-form text-right">Seleccione Fecha Inicial</label>
                    <div class="col-sm-2">                        
                        <input type="date" name="fechaValini" class="form-control rounded border-primary text-secondary">
                    </div>
                    <label for="fechaValfin" class="col-sm-3 label-form text-right">Seleccione Fecha Final</label>
                    <div class="col-sm-2">                        
                        <input type="date" name="fechaValfin" class="form-control rounded border-primary text-secondary">
                    </div> 
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-info"><b>BUSCAR</b></button> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="button" class="btn btn-success" onclick="javascript:window.print()" value="IMPRIMIR">
                    
                </div>
            </form>
        </div>
    </div>
    
@stop

@section('content')

<div style="background: linear-gradient(lightgreen, pink)" class="card">
    
    <h1 class="text-center" style="color: rgb(3, 3, 126)"><b>TRANSPORTES H. R.</b></h1>
    <h4 class="text-center" style="color: rgb(3, 3, 126)"><b>Santo Tomás de Castilla</b></h4>
<br>
    <h1 class="text-center" style="color: rgb(8, 8, 175)"><b>BOLETA DE PAGO</b></h1>
    <br>
    <h3>RECIBÍ DE: &nbsp;  <b>TRANSPORTES H.R.</b></h4>
    <br>
    <h5>POR CONCEPTO DE: &nbsp; PAGO DE <label style="font-size: larger" id="resultado">
    </label> VIAJES EFECTUADOS CORRESPONDIENTES AL MES DE &nbsp;<b style="font-size: 25px" >{{strftime("%B del año %Y", strtotime($fechaValini))}}</b></h5>
    <br>
    <h5>CANCELADO CON EL CHEQUE NÚMERO _____________  DEL BANCO _______________________________________</h5>
  
    
    <div class="card-body">

        <table id="productos" class="table table-hover table table-bordered table-sm">
            <thead style="background-color: darkblue">
                <tr style="color: rgb(243, 241, 245)" class="text-center">
                    <th>FECHA VIAJE</th>
                    <th>No. ORDEN</th>
                    <th>DESTINO</th>
                    <th>VALOR VIAJE</th>
                    <th>DIESEL</th>
                    <th>TOTAL VIAJE</th>
                    <th>PLACAS</th>
                 
                    
                </tr>
            </thead>
          
            <tbody> 
                
                @foreach ($consuplacav as $consuplaca)                
                
                <tr  style="text-align: center; font-weight:bold">
  
                    <td>{{date('d-m-Y', strtotime($consuplaca->fechaboleta))}}</td>
                    <td>{{$consuplaca->id}}</td>
                    <td style="text-align: left">{{$consuplaca->cliente->nombrecliente}}</td>
                    <td>{{$consuplaca->valorpago}}</td>
                    <td>{{$consuplaca->descuento->valor}} </td>
                    <td>{{$consuplaca->valorpago-$consuplaca->descuento->valor}}</td>
                    <td>{{$consuplaca->transporte->placas}}</td> 
                   
                </tr> 
                
                @endforeach  
                
            </tbody> 
                
                <tfoot>
                    <tr>
                        <td style="font-size: 20px; font-weight: bold" class="text-center" colspan="3">TOTALES</td>
                        <td style="font-size: 17px; font-weight: bold" class="text-center" id="tdTotal"></td>
                        <td style="font-size: 17px; font-weight: bold" class="text-center" id="tdTotal1"></td>
                        <td style="font-size: 17px; font-weight: bold" class="text-center" id="tdTotal2"></td>
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
                    const table = document.getElementById("productos");

                    for ( let i = 1; i < table.rows.length-1; i++ ){
                        //console.log (table.rows[i].cells[4].innerHTML);
                        let rowValue = table.rows[i].cells[3].innerHTML;
                        total = total + Number(rowValue);
                    }

                    const tdTotal = document.getElementById("tdTotal");
                    tdTotal.textContent = "Q " + " " + total;

                    for ( let i = 1; i < table.rows.length-1; i++ ){
                        //console.log (table.rows[i].cells[4].innerHTML);
                        let rowValue = table.rows[i].cells[4].innerHTML;
                        total1 = total1 + Number(rowValue);
                    }

                   // console.log(total);

                   const tdTotal1 = document.getElementById("tdTotal1");
                    tdTotal1.textContent = "Q " + " " + total1;

                    for ( let i = 1; i < table.rows.length-1; i++ ){
                        //console.log (table.rows[i].cells[4].innerHTML);
                        let rowValue = table.rows[i].cells[5].innerHTML;
                        total2 = total2 + Number(rowValue);
                    }

                   // console.log(total);

                   const tdTotal2 = document.getElementById("tdTotal2");
                    tdTotal2.textContent = "Q " + " " + total2;
                  
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