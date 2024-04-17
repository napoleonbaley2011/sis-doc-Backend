<script>
export default {
    props: {
        num: Number // Suponiendo que la ID es un número, ajusta el tipo según el tipo de dato de la ID
    },
    mounted() {
        console.log('ID recibida:', this.num);
        // Aquí puedes realizar acciones adicionales con la ID recibida
    }
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from "@inertiajs/vue3";
import EtiquetaForm from '@/Components/Etiquetas/Form.vue';
const form = useForm({
    name: '', categoria: ''
})
</script>
<template>
    <AppLayout>
        <h1>Programar Documento</h1>
        <p>ID recibida: {{ num }}</p>
        <div class="body">
            <div class="container">
                <div class="letras">
                    <h1>Programación de Documentos</h1>
                </div>
                <form action="#" method="POST" class="form">
                    <div class="input-group">
                        <label for="fechaSubida">Fecha de Subida:</label>
                        <input type="date" id="fechaSubida" name="fechaSubida" required>
                    </div>
                    <div class="input-group">
                        <label for="fechaEntrega">Fecha de Entrega:</label>
                        <input type="date" id="fechaEntrega" name="fechaEntrega" required>
                    </div>
                    <div class="input-group">
                        <label for="comentarios">Comentarios:</label>
                        <textarea id="comentarios" name="comentarios"></textarea>
                    </div>
                    <div class="input-group">
                        <label for="calificacion">Tipo de documento:</label>
                        <select id="calificacion" name="calificacion" required>
                            <option value="1">Planear</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required>
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
.letras{
    text-align: center;
    font-size: x-large;
    padding: 5%;
}
.container {
  width: 100%;
  max-width: 800px; /* Limita el ancho del formulario */
  padding: 20px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Agrega sombra al contenedor */
}


.form {
  display: grid;
  grid-template-columns: repeat(2, 1fr); /* Divide el formulario en dos columnas */
  grid-gap: 20px; /* Espacio entre las columnas */
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
  width: 100%;
  padding: 10px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

</style>