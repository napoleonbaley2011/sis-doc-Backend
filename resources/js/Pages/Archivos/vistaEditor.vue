<script setup>

defineProps({
    documentos:{
        type: Array,
        required: true
    }
})

</script>
<template>
    <h1>Hola Editor</h1>
    <h1> {{ documentos }} </h1>
</template>