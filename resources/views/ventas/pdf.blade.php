<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     <style>
        *{
            font-family: Arial, Helvetica, sans-serif
        }
        h2{
            text-align: center
        }
        table{ 
            width: 90%;
            margin: auto;
            text-align: center;
            border-collapse: collapse;
            border-spacing: 0.5rem;
        }
            thead{
                background: #dcdcdc;
            }
            tr{
                border: solid 1px #dcdcdc ;
            }
            td{
                padding-top: 0.5rem;
                padding-bottom: .5rem
            }
        .encabezado{
            width:30%;
            margin: auto;   
        }
        .encabezado div{
            margin-bottom: 0.5rem;
            text-transform: capitalize
        }
    </style>
</head>
<body>
    <h2>
        DESPENSA
    </h2>
    
        @php
            $sub=0.00;
        @endphp
        <div class="encabezado">
            <div>Venta N°: {{$venta[0]->venta_id}}</div>
            <div>vendedor: {{$venta[0]->usu_id}}</div>
            <div>Fecha y hora: {{$venta[0]->created_at}}</div>
        </div>

    <table>
        <tr>
            <th>Cantidad</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Subtotal</th>
        </tr>
        @foreach ($venta as $venta)
            
        
            @foreach($venta->detalle as $detalle)
       
            <tr>
                <td>{{ $detalle->det_cantidad}}</td>
                <td>{{ $detalle->prod_nom}}</td>
                <td>${{$detalle->det_prod_precio}}</td>
                
                <td>
                    @php
                        $sub=bcmul($detalle->det_cantidad,$detalle->det_prod_precio,2);
                    @endphp
                    ${{$sub}}
                </td>
                
            </tr>
            
            @endforeach
        @endforeach
        <tr>
            <td colspan="3" style="text-align:start"><b>Total</b></td>
            <td>${{$venta->venta_total}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:start"><b>Pago</b></td>
            <td>-${{$venta->dinero_cliente}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:start"><b>Vuelto</b></td>
            <td>${{$venta->dinero_vuelto}}</td>
        </tr>
    </table>
</body>
</html>