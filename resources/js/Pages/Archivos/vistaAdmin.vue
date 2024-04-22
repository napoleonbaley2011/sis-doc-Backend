<script setup>

defineProps({
    documentos:{
        type: Array,
        required: true
    }
})

</script>
<template>
    <h1>Hola Admin</h1>
    <h1> {{ documentos }} </h1>
</template>