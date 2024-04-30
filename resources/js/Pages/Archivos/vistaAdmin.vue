<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';
defineProps({
    archivos: {
        type: Array,
        required: true
    },
    etiqueta: {
        type: Array,
        required: true
    },
    tipo: {
        type: Array,
        required: true
    }
})
const archivoSeleccionado = ref(null);

function mostrarArchivo(archivo) {
    this.$inertia.visit(`/obtener-archivo/${archivo.id}`)
        .then(response => {
            archivoSeleccionado.value = response.data;
            document.getElementById('modalArchivo').show();
        })
        .catch(error => {
            console.error('Error al obtener el archivo:', error);
        });
}

function descargarArchivo(archivo) {
    window.open(`/archivos/${archivo.nombre_archivo}`, '_blank');
}
</script>
<template>
    <AppLayout>
        <template #header>
            <div class="titulo">
                <h1>ARCHIVOS</h1>
            </div>
            <h1>{{ etiqueta[0].nombre }} --- {{ tipo[0].tipo_documento }}</h1>
            <div class="attendance">
                <h1>Lista de Archivos</h1>
                <div class="attendance-list">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre del Archivo</th>
                                <th>Encargado</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="archivo in archivos.data" :key="archivo.id">
                                <td>{{ archivo.id }}</td>
                                <td>
                                    <button @click="mostrarArchivo(archivo)"> {{ archivo.nombre_archivo }} </button>
                                </td>
                                <td>{{ archivo.encargado }}</td>
                                <td>
                                    <span
                                        :class="{ 'circulo-rojo': archivo.estado_archivo === 0, 'circulo-amarillo': archivo.estado_archivo === 1, 'circulo-verde': archivo.estado_archivo === 2 }"></span>
                                </td>
                                <td>
                                    <Link :href="route('archivos.aceptar', archivo.id)" class="btn-edit">Aceptar</Link>
                                    <button @click="descargarArchivo(archivo)" class="btn-download">Descargar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </template>
    </AppLayout>

    <!-- Modal -->
    <b-modal id="modalArchivo" title="Visualizar Archivo">
        <!-- Contenido del modal -->
        <div class="archivo-modal-content">
            <!-- Mostrar el contenido del archivo seleccionado -->
            <div v-if="archivoSeleccionado">
                <h3>{{ archivoSeleccionado.nombre_archivo }}</h3>
                <pre>{{ archivoSeleccionado.contenido }}</pre>
            </div>
        </div>
    </b-modal>
</template>
<style>
.titulo{
    text-align: center;
    color: #131c46;
    font-family: 'Gill Sans', 'Gill Sans MT', 'Trebuchet MS', sans-serif ;
    border-bottom: 2px solid #bebebe;
}

.attendance {
    margin-top: 20px;
    text-transform: capitalize;
    font-size: 12px;
}

.attendance-list {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    border: 1px solid #bebebe;
}

.table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 15px;
    min-width: 100%;
    overflow: hidden;
    border-radius: 5px 5px 0 0;
}

table thead tr {
    color: #000000;
    background: #60a5fa;
    text-align: left;
    font-weight: bold;
}

.table th,
.table td {
    padding: 12px 15px;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
}

.table tbody tr:nth-of-type(odd) {
    background: #f3f3f3;
}

.btn-edit {
    padding: 6px 20px;
    border-radius: 10px;
    cursor: pointer;
    background: #34af6d;
    /* Color verde bonito */
    border: none;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-edit:hover {
    background: #269e54;
    /* Color verde oscuro al pasar el mouse */
}

/* Estilos para el botón "Eliminar" */
.btn-delete {
    padding: 6px 20px;
    border-radius: 10px;
    cursor: pointer;
    background: #ff4d4d;
    /* Color rojo bonito */
    border: none;
    color: #fff;
    transition: background-color 0.3s ease;
}

.btn-delete:hover {
    background: #e63939;
    /* Color rojo oscuro al pasar el mouse */
}
/* Estilos personalizados para el modal o ventana emergente */
.b-modal-dialog {
    max-width: 800px;
}

.archivo-modal-content {
    padding: 20px;
}

/* Estilos para el botón "Descargar" */
.btn-download {
    padding: 6px 20px;
    border-radius: 10px;
    cursor: pointer;
    background: #3498db;
    /* Color azul bonito */
    border: none;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.btn-download:hover {
    background: #2980b9;
    /* Color azul oscuro al pasar el mouse */
}

.circulo-rojo {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #ff0000; /* Rojo */
    display: inline-block;
}

.circulo-amarillo {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #ffff00; /* Amarillo */
    display: inline-block;
}

.circulo-verde {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background-color: #00ff00; /* Verde */
    display: inline-block;
}
</style>