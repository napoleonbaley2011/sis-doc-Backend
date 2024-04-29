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

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .grafico-barra {
            width: 100%;
            max-width: 600px; /* Ancho máximo del gráfico */
            margin: 20px auto;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }
        .barra {
            display: inline-block;
            width: calc(50% - 5px); /* Ancho de cada barra */
            height: 200px; /* Altura de las barras */
            background-color: #6c5ce7; /* Color de las barras revisadas */
            vertical-align: bottom;
            transition: height 0.5s ease-in-out;
        }
        .barra.sin-revisar {
            background-color: #ff7675; /* Color de las barras no revisadas */
        }
        .etiqueta {
            text-align: center;
            margin-top: 5px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>

<body>
    <h1>Reporte de Archivos</h1>
    <p>Empresa: Ingenieria de Transportes RL.LTDA</p>
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
            <?php $totalArchivos = 0; ?>
            @foreach ($archivos as $archivo)
                <tr>
                    <td>{{ $archivo->nombre_categoria }}</td>
                    <td>{{ $archivo->cantidad_archivos_revisados }}</td>
                    <td>{{ $archivo->cantidad_archivos_sin_revisar }}</td>
                    <td>{{ $archivo->total_archivos }}</td>
                </tr>
                <?php $totalArchivos += $archivo->total_archivos; ?>
            @endforeach
            <tr>
                <td colspan="3"><strong>Total de Archivos:</strong></td>
                <td><strong>{{ $totalArchivos }}</strong></td>
            </tr>
        </tbody>
    </table>
    <!-- Gráfico de barras -->
    <div class="grafico-barra">
        @foreach ($archivos as $archivo)
            <div class="barra" style="height: {{ $archivo->cantidad_archivos_revisados * 5 }}px;"></div>
            <div class="barra sin-revisar" style="height: {{ $archivo->cantidad_archivos_sin_revisar * 5 }}px;"></div>
        @endforeach
    </div>

    <!-- Leyenda del gráfico -->
    <div style="text-align: center;">
        <div style="display: inline-block; margin-right: 20px;">
            <div style="width: 20px; height: 20px; background-color: #6c5ce7; display: inline-block;"></div>
            <span class="etiqueta">Archivos Revisados</span>
        </div>
        <div style="display: inline-block;">
            <div style="width: 20px; height: 20px; background-color: #ff7675; display: inline-block;"></div>
            <span class="etiqueta">Archivos Sin Revisar</span>
        </div>
    </div>
</body>

</html>
