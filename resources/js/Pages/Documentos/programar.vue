<script>
export default {
    props: {
        num: Number
    },
    mounted() {
        console.log('ID recibida:', this.num);
    }
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";
import { defineProps } from 'vue';
const props = defineProps(['num']);
const numValue = props.num;
const form = useForm({
    fechaSubida: '',
    fechaEntrega: '',
    comentarios: '',
    tipodoc: '',
    nombre: '',
    categoria: numValue,
    id_user: 1,
})


const submitForm = async () => {
    try {
        await form.post(route('programar.store'));
        // La solicitud se realizó con éxito, puedes realizar acciones adicionales aquí si lo deseas
    } catch (error) {
        console.error('Error al enviar el formulario:', error);
        // Manejar el error aquí si la solicitud falla
    }
};
const hoy = new Date(); // Obtiene la fecha y hora actuales
hoy.setDate(hoy.getDate() - 1); // Resta un día a la fecha actual

const fechaAnterior = hoy.toISOString().split('T')[0];
</script>

<template>
    <AppLayout>
        <div class="body">
            <div class="container">
                <div class="letras">
                    <h1>Programación de Documentos</h1>
                    <p>ID recibida: {{ num }}</p>
                </div>
                <form @submit.prevent="submitForm" class="form" :form="form">
                    <div class="input-group">
                        <label for="fechaSubida">Fecha de Subida:</label>
                        <input type="date" id="fechaSubida" name="fechaSubida" v-model="form.fechaSubida" :min="fechaAnterior" required>
                    </div>
                    <div class="input-group">
                        <label for="fechaEntrega">Fecha de Entrega:</label>
                        <input type="date" id="fechaEntrega" name="fechaEntrega" v-model="form.fechaEntrega" :min="form.fechaSubida" required>
                    </div>
                    <div class="input-group">
                        <label for="comentarios">Comentarios:</label>
                        <textarea id="comentarios" name="comentarios" v-model="form.comentarios"></textarea>
                    </div>
                    <div class="input-group">
                        <label for="tipodoc">Tipo de documento:</label>
                        <select id="tipodoc" name="tipodoc" v-model="form.tipodoc" required>
                            <option value="1">Procedimientos</option>
                            <option value="2">Planes</option>
                            <option value="3">Registro</option>
                            <option value="4">Informes</option>
                            <option value="5">Documentos Legales</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" v-model="form.nombre" required>
                    </div>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </AppLayout>
</template>
<style>
.body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f0f0f0;
}

.letras {
    text-align: center;
    font-size: x-large;
    padding: 5%;
}

.container {
    width: 100%;
    max-width: 800px;
    /* Limita el ancho del formulario */
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    /* Agrega sombra al contenedor */
}


.form {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    /* Divide el formulario en dos columnas */
    grid-gap: 20px;
    /* Espacio entre las columnas */
}

.input-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
input[type="number"],
textarea {
    width: 100%;
    padding: 8px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

button {
    width: 50%;
    padding: 5px;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    cursor: pointer;

}
</style>