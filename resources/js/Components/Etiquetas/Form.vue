<script>
export default{
    name: 'EtiquetaForm'
}
</script>

<script setup>
defineProps({
    form:{
        type: Object,
        required: true
    },
    updating: {
        type: Boolear,
        required: false,
        default: false
    }
})

defineEmits(['submit'])
</script>

<template>
    
</template>