<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <button v-if="$page.props.user.permission.includes('create roles')">Crear Roles</button>
        <button v-if="$page.props.user.permission.includes('create documentos')">Crear nuevo documento</button>
    </div>
</template>
<style>
button {
    background-color: #f5ff68;
    color: black;
    padding: 20px;
    margin: 5px;
}
</style>

