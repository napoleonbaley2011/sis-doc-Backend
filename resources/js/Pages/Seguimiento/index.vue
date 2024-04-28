<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Inertia } from '@inertiajs/inertia';

defineProps({
    archivos: {
        type: Array,
        required: true
    }
})
const deleteArchivo = id => {
    if (confirm('Estas Seguro ?')) {
        Inertia.delete(route('archivos.eliminar', id));
    }
}
</script>
<template>
    <AppLayout>
        <template #header> 
            <h1>Hola Seguimientos</h1>
            <h1>{{ archivos.id }}</h1>
            <!--<h1>{{ archivos }}</h1>-->
            <div class="attendance-list">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Nombre Repositorio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="archivo in archivos">
                            <td>{{ archivo.id }}</td>
                            <td>{{ archivo.nombre_archivo }}</td>
                            <td>{{ archivo.nombre }}</td>
                            <td> 
                                <button @click="deleteArchivo(archivo.id)" class="btn-delete">Eliminar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </template>
    </AppLayout>

</template>
<style>
.attendance {
    margin-top: 30px;
    text-transform: capitalize;
}

.attendance-list {
    width: 100%;
    padding: 30px;
    margin-top: 10px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    border: 1px solid #bebebe;
}

.table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 20px;
    min-width: 100%;
    overflow: hidden;
    border-radius: 5px 5px 0 0;
}

table thead tr {
    color: #FFFFFF;
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

.estado-repo {
    padding: 8px 12px;
    border-radius: 5px;
    font-weight: bold;
    text-align: center;
}

.activo {
    background-color: #28a745;
    /* Verde para estado activo */
    color: #fff;
}

.inactivo {
    background-color: #dc3545;
    /* Rojo para estado inactivo */
    color: #fff;
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

.circulo {
    display: inline-block;
    width: 30px;
    /* Ancho del círculo */
    height: 30px;
    /* Altura del círculo */
    line-height: 30px;
    /* Alineación vertical del número */
    border-radius: 50%;
    /* Forma circular */
    background-color: #60a5fa;
    /* Color de fondo del círculo */
    color: white;
    /* Color del número dentro del círculo */
    text-align: center;
    /* Alineación horizontal del número */
}
</style>
