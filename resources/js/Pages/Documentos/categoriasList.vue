<script>
export default {
    name: 'ListaTodo'
}
</script>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from "@inertiajs/vue3";

defineProps({
    etiquetas:{
        type: Object,
        required: true
    }    
})



const deleteEtiqueta = id =>{
    if(confirm('Estas Seguro ?')){
        Inertia.delete(route('etiquetas.destroy', id));
    }
}

</script>
<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Etiquetas</h1>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <Link :href="route('etiquetas.create')" class="text-white bg-orange-300 hover:bg-orange-500 py-2 px-4 rounded">
                    Crear Etiqueta
                    </Link>
                </div>
                <div class="mt-4">
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex justify-between gap-x-6 py-5" v-for="etiqueta in etiquetas.data">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-md font-semibold leading-6 text-gray-900"><Link :href="route('programar.index')">{{etiqueta.nombre}}</Link></p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-md leading-6 text-gray-900">
                                    <Link :href="route('etiquetas.edit', etiqueta.id)">Editar</Link>
                                    <Link @click="deleteEtiqueta(etiqueta.id)">Eliminar</Link>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style>
.tabla{
    display:inline-flexbox;
}
</style>