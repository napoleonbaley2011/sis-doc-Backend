<template>
    <AppLayout>
        <template #header>
            <h1>Archivos Revisados</h1>
            <p>Acontinuacion se muestra la cantidad de archivos revisados y por revisar: </p>
            <p>La caracteristica que presenta es la siguiente: Color Azul Revisados</p>
            <p>La caracteristica que presenta es la siguiente: Color Rojo Sin Revisar</p>
            <div>
                <!-- Tu contenido existente aquí -->
                <a :href="route('reporte.create')" target="_blank">Reportes</a>
            </div>
            <div id="chartContainerWrapper">
                <div v-for="archivo in archivos" :key="archivo.id" id="chartContainer">
                    <h3 class="texto">{{ archivo.nombre_categoria }} , {{ archivo.total_archivos }}</h3>
                    <!-- Mostrar el nombre del archivo -->
                    <div class="bar revisado"
                        :style="{ height: calcularAltura(archivo.cantidad_archivos_revisados) + 'px' }">
                        <span>{{ archivo.cantidad_archivos_revisados }}</span>
                    </div>
                    <div class="bar sin-revisar"
                        :style="{ height: calcularAltura(archivo.cantidad_archivos_sin_revisar) + 'px' }">
                        <span>{{ archivo.cantidad_archivos_sin_revisar }}</span>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps } from 'vue';
import jsPDF from 'jspdf';
const props = defineProps({
    archivos: {
        type: Array,
        required: true
    }
});

// Función para calcular la altura de las barras en función de la cantidad de archivos
function calcularAltura(cantidadArchivos) {
    const maxCantidad = Math.max(
        ...props.archivos.map(archivo => archivo.cantidad_archivos_revisados + archivo.cantidad_archivos_sin_revisar)
    );
    return (cantidadArchivos / maxCantidad) * 200; // 200px es la altura máxima que deseas para las barras
}

function generarPDF() {
  const doc = new jsPDF();
  const chartContainer = document.getElementById('chartContainerWrapper');
  doc.html(chartContainer, {
    callback: function (doc) {
      doc.save('reporte.pdf');
    }
  });
}
</script>

<style>
/* Estilos para el contenedor del gráfico */
#chartContainerWrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    margin-bottom: 20px;
}

#chartContainer {
    width: 400px;
    height: 400px;
    margin: 10px;
    border: 1px solid #ccc;
    overflow: hidden;
    position: relative;
    display: flex;
    justify-content: right;
    align-items: flex-end;
    padding: 10px;
    box-sizing: border-box;
    background-color: #f7f7f7;
    border-radius: 5px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Estilos para las barras */
.bar {
    width: 140px;
    /* Ancho de las barras */
    background-color: #6c5ce7;
    /* Color base de las barras */
    margin-right: 20px;
    /* Espacio entre barras */
    transition: height 0.5s ease-in-out, width 0.5s ease-in-out;
    /* Animación de altura y ancho */
    border-radius: 5px;
    overflow: hidden;
    position: relative;
}

/* Estilos para el texto de las barras */
.bar span {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 14px;
    color: #ffffff;
}

/* Estilos para las etiquetas de las barras */
.bar .label {
    position: absolute;
    bottom: 5px;
    left: 50%;
    transform: translateX(-50%);
    font-size: 12px;
    font-weight: bold;
    color: #555;
}

/* Estilos para las barras de diferentes colores */
.bar.revisado {
    background-color: #74b9ff;
    /* Azul para elementos revisados */
}

.bar.sin-revisar {
    background-color: #ff7675;
    /* Rojo para elementos sin revisar */
}
</style>
