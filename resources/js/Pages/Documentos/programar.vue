<script>
export default {
    props: {
        num: Number,
        etiqueta:Number
    },
    mounted() {
        console.log('ID recibida:', this.num);
        console.log('IDETIQUETA recibida:', this.etiqueta);
    },
    methods: {
        goBack() {
            window.history.back();
        }
    }
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";
import { defineProps } from 'vue';
const props = defineProps(['num','etiqueta']);
const numEtiqueta = props.etiqueta;
const numValue = props.num;
const form = useForm({
    fechaSubida: '',
    fechaEntrega: '',
    comentarios: '',
    tipodoc: '',
    nombre: '',
    categoria: numValue,
    etiqueta:numEtiqueta,
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
        <div class="form-container" >
            <h2>Programacion de Repositorio</h2>
            <hr class="form-divider">
            <form @submit.prevent="submitForm" :form="form">
                <div class="form-group">
                    <div class="half">
                        <label for="full-name">Nombre:</label>
                        <input type="text" id="full-name" name="full-name" v-model="form.nombre" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="half">
                        <label for="upload-date">Fecha de Subida:</label>
                        <input type="date" id="upload-date" name="upload-date" v-model="form.fechaSubida"
                            :min="fechaAnterior" required>
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <div class="half">
                        <label for="due-date">Fecha de Entrega:</label>
                        <input type="date" id="due-date" name="due-date" v-model="form.fechaEntrega" :min="form.fechaSubida"
                            required>
                        <i class="far fa-calendar-alt"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Comentarios:</label>
                    <textarea id="comment" name="comment" class="comment" v-model="form.comentarios" required></textarea>
                </div>
                <div class="form-group">
                    <label for="doc-type">Tipo de Documento:</label>
                    <select id="doc-type" name="doc-type" v-model="form.tipodoc" required>
                        <option value="">Seleccione...</option>
                        <option value="1">Procedimiento</option>
                        <option value="2">Planes</option>
                        <option value="3">Registros</option>
                        <option value="4">Informes</option>
                        <option value="5">Documentos Legales</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit">Enviar</button>
                    <button @click="goBack" class="back-button">Cancelar</button>
                </div>
            </form>
        </div>

        
    </AppLayout>
</template>
<style>
.form-container {
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding: 35px;
    width: 500px;
    margin: 50px auto 0;
}
.form-divider {
    border: none;
    border-bottom: 2px solid #000; 
    margin: 20px 0;
}
.form-container h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    box-sizing: border-box;
    /* Para que el padding no afecte el ancho */
    background-color: #e4e4e5;
}

.form-group .half {
    width: calc(50% - 5px);
    display: inline-block;
    vertical-align: top;
    /* Alineación superior para los campos en línea */
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
    width: 100%;
    display: block;
    margin-top: 20px;
}

.form-group button:hover {
    background-color: #3a8ce0;
}

/* Estilos adicionales para los iconos si los usas */
.fa {
    margin-right: 10px;
}

/* Estilos para el contenedor principal si es necesario */
.body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
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
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}
</style>
