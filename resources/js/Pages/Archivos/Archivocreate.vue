<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';

const props = defineProps({
    iddoc: {
        type: Object,
        required: true
    }
})

const num = props.iddoc;

const form = useForm({
    file: '',
    encargado: '',
    comentario:'',
    id: num,
})
const handleFileChange = (event) => {
    form.file = event.target.files[0]; // Obtener el archivo seleccionado
};
const submitForm = () => {
    form.post(route('archivos.upload'), {
        onSuccess: () => {
            console.log('Archivo subido exitosamente');
            // Redireccionar u otra acción después de subir el archivo
        },
        data: {
            file: form.file,
            encargado: form.encargado,
            comentario: form.comentario,
            id: form.id,
        }
    });
};
</script>
<template>
    <AppLayout>
        <div class="form-container">
            <h2 class="form-title">Formulario Revisar</h2>
            <hr class="form-divider">
            <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="container">
                        <label for="archivo">Seleccionar archivo</label>
                        <div class="file-input">
                            <input type="file" name="archivo" id="archivo" class="inputfile" accept=".pdf,.doc,.docx" @change="handleFileChange" />
                        </div>
                        <!-- Mostrar el nombre del archivo seleccionado -->
                        <div v-if="form.file">{{ form.file.name }}</div>
                    </div>
                    <div class="half">
                        <label for="due-date">Registrado:</label>
                        <input type="text" id="full-name" v-model="form.encargado" name="full-name" required>
                    </div>
                    <label for="comment">Comentarios:</label>
                    <textarea id="comment" v-model="form.comentario" class="comment" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Enviar</button>
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
    width: 700px;
    margin: 50px auto 0;
}

.form-title {
    text-align: center;
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

.form-group .fa {
    margin-right: 10px;
}

.form-group .half {
    width: calc(100% - 5px);
    display: inline-block;
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

.file-input {
    margin-bottom: 15px;
}
</style>