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
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>E-mail</th>
                    <th>rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                <tr>
                    <td>{{$user->usu_dni}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->usu_apellido}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tipo->tip_nombre ?? ''}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
</body>
</html>
