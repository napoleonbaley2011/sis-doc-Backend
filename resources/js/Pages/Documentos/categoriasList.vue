<script>
export default {
    name: 'ListaTodo'
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from "@inertiajs/vue3";
defineProps({
    etiquetas: {
        type: Object,
        required: true
    }
})


const deleteEtiqueta = id => {
    if (confirm('Estas Seguro ?')) {
        Inertia.delete(route('etiquetas.destroy', id));
    }
}
</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Etiquetas</h1>
            <div class="attendance">
                <h1>Lista de Etiquetas</h1>
                <div class="attendance-list">
                    <div>
                        <Link :href="route('etiquetas.create')" class="text-white bg-sky-600 hover:bg-sky-500 py-2 px-4 rounded mt-4 mb-4">
                        Crear Etiqueta
                        </Link>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre Etiqueta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="etiqueta in etiquetas.data" :key="etiqueta.id">
                                <td>{{ etiqueta.id }}</td>
                                <td>
                                    <Link :href="route('programar.create', { id: etiqueta.id_categoria })">{{
                                        etiqueta.nombre }}</Link>
                                </td>
                                <td>
                                    <Link :href="route('etiquetas.edit', etiqueta.id)" class="btn-edit">Editar</Link>   
                                    <button @click="deleteEtiqueta(etiqueta.id)" class="btn-delete">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </template>
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
</style>