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
    <h1>Programar Documento</h1>
    <p>ID recibida: {{ num }}</p>
</template>
