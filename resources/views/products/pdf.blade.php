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
    </style>
</head>
<body>
    <div>
    <table>
        <thead>
            <tr>
                <th>Cod.</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Marca</th>
                <th>Precio</th>
                <th >Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $producto)
            <tr>
                <td >{{$producto->prod_cod}}</td>
                <td>{{$producto->prod_nom}}</td>
                <td>{{$producto->prod_descripcion}}</td>
                <td>{{$producto->marca->marca_nombre ?? 'sin marca'}}</td>
                <td>$ {{$producto->prod_precio}}</td>
                <td>{{$producto->prod_stock}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
