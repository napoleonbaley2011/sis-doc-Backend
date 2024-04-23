<script>
export default {
    name: 'EditarEtiqueta'
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";
import EtiquetaForm from '@/Components/Etiquetas/Form.vue';
import { defineProps } from 'vue';

const props = defineProps({
    etiqueta: {
        type: Object,
        required: true
    }
})
const form = useForm({
    nombre:''
})
const nombre = props.etiqueta[0].nombre
const id = props.etiqueta[0].id;

const submitForm = async () => {
    try {
        await form.put(route('etiquetas.update', { id: id }), { data: form });
        // La solicitud se realizó con éxito, puedes realizar acciones adicionales aquí si lo deseas
    } catch (error) {
        console.error('Error al enviar el formulario:', error);
        // Manejar el error aquí si la solicitud falla
    }
};
</script>

<template>
    <AppLayout title="Editar Categoria">
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Editar Etiqueta</h1>
            <p>Nombre Actual es : {{ nombre }}</p>
            <div class="container6">
                <h1>Crear Nueva Etiqueta</h1>
                <form @submit.prevent="submitForm" :form="form">
                    <label for="nombre">Nombre de la Etiqueta:</label>
                    <input type="text" id="nombre" name="nombre" v-model="form.nombre" required>
                    <button type="submit">Crear Etiqueta</button>
                </form>
            </div>
        </template>
    </AppLayout>
</template>
<style>
.container6 {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 10px;
}

input[type="text"] {
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
    margin-bottom: 15px;
}

button[type="submit"] {
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
</style>