<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Archivos</title>
    <style>
        /* Estilos CSS para el PDF */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Reporte de Archivos</h1>
    <table>
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Archivos Revisados</th>
                <th>Archivos Sin Revisar</th>
                <th>Total Archivos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($archivos as $archivo)
                <tr>
                    <td>{{ $archivo->nombre_categoria }}</td>
                    <td>{{ $archivo->cantidad_archivos_revisados }}</td>
                    <td>{{ $archivo->cantidad_archivos_sin_revisar }}</td>
                    <td>{{ $archivo->total_archivos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
