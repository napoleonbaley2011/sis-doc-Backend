<script>
export default {
    name: 'EtiquetaForm'
}
</script>
<script setup>
import FormSection from '@/Components/FormSection.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'

defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false
    }
})

defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Actualizar Etiqueta' : 'Crear Etiqueta' }}
        </template>>

        <template #description>
            {{ updating ? 'Actualiza la etiqueta' : 'Crear la etiqueta para la empresa' }}
        </template>

        <template #form>
            <div class="col-span-6" sm:col-span-6>
                <InputLabel for="name" value="Nombre" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="mt-1 block w-full" />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel for="categoria" value="Categoria" />
                <select id="categoria" v-model="form.categoria" class="mt-1 block w-full">
                    <option value="1">Planear</option>
                    <option value="2">Hacer</option>
                    <option value="3">Verificar</option>
                    <option value="4">Actuar</option>
                </select>
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>

        </template>
        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Actulizar' : 'Crear' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>