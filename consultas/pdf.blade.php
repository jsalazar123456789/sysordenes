<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Despacho de Orden</title>
</head>

<style>

    @page{
        
        margin-top: 0.5cm;
        margin-bottom: 0.5cm; 
        
    }

    body{
        width: 100%;
        height: 100vh;
        
    }

    .titulo{
        line-height: 0rem;
        padding: 0rem;
        margin-top: 5px;
       
    }

    .titulo .pa{
        color: rgb(3, 3, 75);
        font-size: 50px;
        font-weight: bold;
        text-align: center;
        
    }

    .titulo .par{
        color: rgb(3, 3, 75);
        font-size: 18px;
        text-align: center;
        
    }

    .titulo .pare{
        color: rgb(3, 3, 75);
        font-size: 15px;
        text-align: center;
        
    }

    .titulo .parra{
        color: rgb(3, 3, 75);
        font-size: 15px;
        text-align: center;
        
    }

    .envio h3{
        font-family: Arial, Helvetica, sans-serif;
        text-align: center;
        font-size: 25px;
    }

    .linea{
        background-color: black;
        width: 70%;
        margin-left: 30%;
    }


    .table-styLed
    {
        overflow: hidden;
        width: fit-content;
        border-radius: 1rem;
        border: 3px solid black;
        font-family: Arial, Helvetica, sans-serif;
    }

    .table-styLed table
    {
        border-right: hidden;
        border-left: hidden;
        border-top: hidden;
        border-bottom: hidden;
        border-collapse: collapse;
    }

    .table-styLed table th
    {
        background-color: rgb(202, 200, 200);
        justify-content: center;
        font-size: 18px;
        border: 2px solid black;
        
    }

    
    .table-styLed table td
    {
       border-right: 2px solid black;
       font-size: 14px;
       text-align: center;
       padding: 10px 10px;
    }

   </style>
 
<body>

<div class="titulo">
    <p class="pa">TRANSPORTES H.R.</p>
    <p class="par">Comercial Plan de Prestaciones, Local # 13 </p>
    <p class="pare">Santo Tomas de Castilla, Puerto Barrios, Izabal </p>
    <p class="parra">Telefonos: 7952-4330  y  7952-4331</p>
    <hr>
</div>

<div class="envio">
    <h3>ENVIO DE DESPACHO &nbsp; &nbsp; &nbsp; &nbsp; No.  {{$consubolet->id}} </h3>
</div>


<p style="font-size: 16px">Santo Tomas de Castilla: &nbsp; &nbsp; 
    <b style="font-size: 18px">{{date('d', strtotime ($consubolet->fechaboleta))}} </b> 
    &nbsp; &nbsp; de &nbsp; &nbsp; <b style="font-size: 20px">{{strftime(" %B ", strtotime($consubolet->fechaboleta))}}
    </b> &nbsp; &nbsp; de &nbsp; &nbsp; <b style="font-size: 18px">{{date('Y', strtotime ($consubolet->fechaboleta))}} </b>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Contenedor:  &nbsp; <b style="font-size: 15px">{{$consubolet->carga}}</b>
</p>
    

<p>Piloto: &nbsp; &nbsp; <b>{{$consubolet->transporte->piloto}}</b> &nbsp; &nbsp;&nbsp; &nbsp; 
   Placa:  &nbsp; &nbsp; <b>{{$consubolet->transporte->placas}}</b> &nbsp; &nbsp;&nbsp; &nbsp;
   Licencia: &nbsp; &nbsp; <b>{{$consubolet->transporte->licencia}}</b>  </p>

<p>Consignatario: &nbsp; &nbsp;  <b>{{$consubolet->cliente->nombrecliente}}</b> 
    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
   Teléfono: &nbsp; &nbsp;  <b>{{$consubolet->cliente->telefono}}</b>
   
   </p>

<p>
    Dirección: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <b>{{$consubolet->cliente->direcliente}}</b>
    
</p>


<div class="table-styLed">
    <table>
        <thead>
             <tr>
                 <th>CANTIDAD BULTOS</th>
                 <th>PESO</th>
                 <th>CONTENIDO</th>
                 <th>DOCUMENTO SAT</th>
             </tr>
        </thead>
         <tbody>
            <tr>
                 <td>{{$consubolet->cantidad}}</td>
                 <td>{{$consubolet->peso}}</td>
                 <td style="text-align: left">{{$consubolet->contenido}}</td>
                 <td>{{$consubolet->poliza}}</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
           </tr>
           <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
<tr>
    <td></td>
    <td></td>
    <td style="font-size: 20px; text-align:left">Vale No.: &nbsp; &nbsp; &nbsp; <b>{{$consubolet->descuento->documento}}</b> </td>
    <td></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td style="font-size: 15px; text-align: left">CONTACTO: &nbsp; <b>{{$consubolet->cliente->contacto}}</b></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

         </tbody>
     </table>
</div>


<p>Observaciones: &nbsp; &nbsp; {{$consubolet->observaciones}} </p>

<br>
<br>
<br>
________________________ 
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;
_______________________ 
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;
_______________________ <br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
Remitente 
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; 
Piloto
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
Recibí Conforme

</body>
</html>
    

     

  


        
        
     

