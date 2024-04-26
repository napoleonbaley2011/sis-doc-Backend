<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
const props = defineProps({
    archivos: {
        type: Object,
        required: true
    },
})
const num = props.archivos[0].id;
const form = useForm({
    estado:'',
    comentario:'',
    id: num

})
const submitForm = async () => {
    try {
        await form.post(route('archivos.store'));
        // La solicitud se realizó con éxito, puedes realizar acciones adicionales aquí si lo deseas
    } catch (error) {
        console.error('Error al enviar el formulario:', error);
        // Manejar el error aquí si la solicitud falla
    }
};


</script>
<template>
    <AppLayout>
        <template #header>
            <div class="titulo-container">
                <h1 class="titulo-grande">Formulario de Aceptacion</h1>
                <h1 class="titulo-grande">{{ props.archivos[0].nombre_categoria }}</h1>
            </div>
            <div class="form-container">
                <div class="image-container">
                    <img src="../../../img/documento.png" alt="Imagen Descriptiva">
                </div>
                <div class="form-content">
                    <h2>Formulario de Aceptacion</h2>
                    <hr class="form-divider">
                    <form @submit.prevent="submitForm" :form="form">
                        <div class="form-group">
                            <div class="half">
                                <label for="documento">Nombre del Archivo: {{ props.archivos[0].nombre_archivo }}</label>
                            </div>
                            <div class="form-group">
                                <div class="half">
                                    <label for="documento">Fecha de Entrega: {{ props.archivos[0].fecha_modificacion
                                        }}</label>
                                </div>
                                <div class="form-group">
                                    <label for="doc-type">Estado del Archivo:</label>
                                    <select id="doc-type" name="doc-type" v-model="form.estado" required>
                                        <option value="">Seleccione...</option>
                                        <option value="0">Rechazado</option>
                                        <option value="1">En Revisión</option>
                                        <option value="2">Aceptado</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="comentario">Comentario:</label>
                                    <textarea id="comentario" name="comentario" v-model="form.comentario"></textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
<style>
.image-container {
    flex: 0 0 200px;
    /* Ancho fijo para la imagen */
    margin-right: 20px;
    /* Espacio entre la imagen y el formulario */
}

.image-container img {
    width: 100%;
    /* Ajustar el ancho de la imagen al contenedor */
    border-radius: 10px;
    /* Opcional: añadir bordes redondeados */
}

.form-content {
    flex: 1;
    /* El formulario ocupará todo el espacio restante */
}

.titulo-container {
    justify-content: center;
    align-items: center;
}

.titulo-grande {
    font-size: 30px;
    color: #000000;
    text-transform: uppercase;
    letter-spacing: 5px;
    text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.6);
    animation: titulobounce 2s ease infinite;
}

.form-title {
    text-align: center;
}

.form-divider {
    border: none;
    border-bottom: 2px solid #000;
    margin: 20px 0;
}

.form-container {
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    padding: 40px;
    box-shadow: 0 0 10px #60a5fa(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 10px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 15px;
}

.form-group input,
.form-group select {
    width: calc(80% - 10px);
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    background-color: #e4e4e5;
}

.form-group textarea {
    width: calc(80% - 10px);
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    resize: vertical;
    min-height: 100px;
}


.form-group .comment {
    width: calc(100% - 10px);
    display: inline-block;
}

.form-group button {
    background-color: #60a5fa;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
    width: 200px;
    margin: 0 auto;
    display: block;
}

.form-group button:hover {
    background-color: #60a5fa;
}
</style>