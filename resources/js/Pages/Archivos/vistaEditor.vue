<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';

const props = defineProps({
    archivos: {
        type: Object,
        required: true
    },
    iddoc:{
        type: Object,
        required: true
    }
})


const showModal = ref(false);
const archivoSeleccionado = ref(null);

function openModal(archivo) {
    showModal.value = true;
    archivoSeleccionado.value = archivo;
}

</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Archivos</h1>
            <div class="attendance">
                <h1>Lista de Archivos</h1>
                <h1>{{ props.iddoc }}</h1>
                <div class="attendance-list">
                    <div>
                        <Link :href="route('archivos.create', {id: props.iddoc})" class="text-white bg-sky-600 hover:bg-sky-500 py-2 px-4 rounded mt-4 mb-4">Crear Nuevo Archivo</Link>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Archivo</th>
                                <th>Versión</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="archivo1 in props.archivos.data">
                                <td>{{ archivo1.id }}</td>
                                <td>{{ archivo1.nombre_archivo }}</td>
                                <td>{{ archivo1.version }}</td>
                                <td>{{ archivo1.estado_archivo }}</td>
                                <td>
                                    <a href="#" class="btn-celeste" @click="openModal(archivo1)">Comentarios</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </template>

        <div v-if="showModal" class="modal-container">
            <div class="modal-background" @click="showModal = false"></div>
            <div class="modal">
                <h2>Comentarios de {{ archivoSeleccionado.nombre_archivo }}</h2>
                <ul>
                    <li>{{ archivoSeleccionado.comentario }}</li> 
                </ul>
                <button @click="showModal = false">Cerrar modal</button>
            </div>
        </div>
    </AppLayout>
</template>
<style>
.attendance {
    margin-top: 20px;
    text-transform: capitalize;
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

/* Estilos para el botón celeste */
.btn-celeste {
    display: inline-block;
    padding: 8px 16px;
    background-color: #60a5fa;
    /* Color celeste */
    color: #fff;
    /* Color de texto blanco */
    text-decoration: none;
    /* Quitar subrayado del enlace */
    border-radius: 4px;
    /* Bordes redondeados */
    transition: background-color 0.3s ease;
    /* Transición suave del color de fondo */
}

/* Estilo hover para el botón celeste */
.btn-celeste:hover {
    background-color: #3086d6;
    /* Cambio de color al pasar el mouse */
}

.modal-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100px;
    height: 100px;
    
    z-index: 999;
}

.modal {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    max-width: 80%;
    overflow-y: auto;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
}

.modal h2 {
    margin-bottom: 10px;
}

.modal ul {
    padding-left: 20px;
}

.modal button {
    margin-top: 10px;
    padding: 8px 16px;
    border-radius: 4px;
    background-color: #60a5fa;
    color: white;
    border: none;
    cursor: pointer;
}

.modal button:hover {
    background-color: #3086d6;
}
</style>