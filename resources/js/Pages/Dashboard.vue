<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { defineProps } from 'vue';
import TablaDocumento from '@/Pages/Programar/programar.vue'
import Welcome from '@/Components/Welcome.vue';
const props = defineProps({
    archivos: {
        type: Array,
        required: true,

    }
})
</script>
<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div v-if="$page.props.user.permission.includes('create roles')">
                <div class="container">
                    <div class="main-v">
                        <div class="main-top">
                            <h1 class="h1-v">Dashboard</h1>
                            <i class="fas fa-user-cog"></i>
                            <!-- <h1>{{ props.archivos }}</h1>-->
                        </div>
                        <div class="users">
                            <div class="card-v">
                                <img src="../../img/documento.png" class="img-v">
                                <h4 class="h4">PLANEAR</h4>
                                <p class="p">Porcentaje de Avance</p>
                                <p class="p">Numero de Archivos : {{ props.archivos[2].total_archivos }}</p>
                                <div class="per">
                                    <table class="table">
                                        <tr>
                                            <td class="td"><span class="span">{{ props.archivos[2].cantidad_archivos_revisados}}</span></td>
                                            <td class="td"><span class="span">{{ props.archivos[2].cantidad_archivos_sin_revisar }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Revisados</td>
                                            <td class="td">Por Revisar</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-v">
                                <img src="../../img/documento.png" class="img-v">
                                <h4 class="h4">HACER</h4>
                                <p class="p">Porcentaje de Avance</p>
                                <p class="p">Numero de Archivos : {{ props.archivos[1].total_archivos }}</p>
                                <div class="per">
                                    <table class="table">
                                        <tr>
                                            <td class="td"><span class="span">{{ props.archivos[1].cantidad_archivos_revisados}}</span></td>
                                            <td class="td"><span class="span">{{ props.archivos[1].cantidad_archivos_sin_revisar }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Revisados</td>
                                            <td class="td">Por Revisar</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-v">
                                <img src="../../img/documento.png" class="img-v">
                                <h4 class="h4">VERIFICAR</h4>
                                <p class="p">Porcentaje de Avance</p>
                                <p class="p">Numero de Archivos : {{ props.archivos[3].total_archivos }}</p>
                                <div class="per">
                                    <table class="table">
                                        <tr>
                                            <td class="td"><span class="span">{{ props.archivos[3].cantidad_archivos_revisados}}</span></td>
                                            <td class="td"><span class="span">{{ props.archivos[3].cantidad_archivos_sin_revisar }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Revisados</td>
                                            <td class="td">Por Revisar</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-v">
                                <img src="../../img/documento.png" class="img-v">
                                <h4 class="h4">ACTUAR</h4>
                                <p class="p">Porcentaje de Avance</p>
                                <p class="p">Numero de Archivos : {{ props.archivos[0].total_archivos }}</p>
                                <div class="per">
                                    <table class="table">
                                        <tr>
                                            <td class="td"><span class="span">{{ props.archivos[0].cantidad_archivos_revisados}}</span></td>
                                            <td class="td"><span class="span">{{ props.archivos[0].cantidad_archivos_sin_revisar }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Revisados</td>
                                            <td class="td">Por Revisar</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container4">
                    <a :href="route('programar.index')" class="button-link4">Lista de Documentos</a>
                </div>  
            </div>

            <div v-if="$page.props.user.roles.includes('transcriptor')">
                {{ $page.props.user.roles }}
                <div class="container">
                    <div class="main-v">
                        <div class="main-top">
                            <h1 class="h1-v">Dashboard</h1>
                            <i class="fas fa-user-cog"></i>
                        </div>
                        <div class="users">
                            <div class="card-v">
                                <img src="../../img/documento.png" class="img-v">
                                <h4 class="h4">PLANEAR</h4>
                                <p class="p">Porcentaje de Avance</p>
                                <div class="per">
                                    <table class="table">
                                        <tr>
                                            <td class="td"><span class="span">85%</span></td>
                                            <td class="td"><span class="span">87%</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Revisados</td>
                                            <td class="td">Por Revisar</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-v">
                                <img src="../../img/documento.png" class="img-v">
                                <h4 class="h4">HACER</h4>
                                <p class="p">Porcentaje de Avance</p>
                                <div class="per">
                                    <table class="table">
                                        <tr>
                                            <td class="td"><span class="span">85%</span></td>
                                            <td class="td"><span class="span">87%</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Revisados</td>
                                            <td class="td">Por Revisar</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-v">
                                <img src="../../img/documento.png" class="img-v">
                                <h4 class="h4">VERIFICAR</h4>
                                <p class="p">Porcentaje de Avance</p>
                                <div class="per">
                                    <table class="table">
                                        <tr>
                                            <td class="td"><span class="span">85%</span></td>
                                            <td class="td"><span class="span">87%</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Revisados</td>
                                            <td class="td">Por Revisar</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-v">
                                <img src="../../img/documento.png" class="img-v">
                                <h4 class="h4">ACTUAR</h4>
                                <p class="p">Porcentaje de Avance</p>
                                <div class="per">
                                    <table class="table">
                                        <tr>
                                            <td class="td"><span class="span">85%</span></td>
                                            <td class="td"><span class="span">87%</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td">Revisados</td>
                                            <td class="td">Por Revisar</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container4">
                    <a :href="route('programar.index')" class="button-link4">Lista Repositorios Activos</a>
                </div> 
                
                
            </div>
        </template>
    </AppLayout>
</template>
<style>
.container4 {
    display: flex;
    justify-content: center;
    align-items: center;
    /* Ajusta la altura según tus necesidades */
    font-size: 20px;
}

.button-link4 {
    padding: 10px 20px;
    font-size: 18px;
    /* Tamaño de la letra del enlace */
    background-color: #60a5fa;
    /* Color de fondo azul */
    color: #fff;
    /* Color del texto blanco */
    text-decoration: none;
    /* Eliminar subrayado del enlace */
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    /* Transición suave al pasar el ratón */
}

.button-link4:hover {
    background-color: #3a8ce0;
    /* Cambia el color de fondo al pasar el ratón */
}


.container {
    display: flex;
}

.main-v {
    position: relative;
    padding: 20px;
    width: 100%;
}

.main-top {
    display: flex;
    width: 100%;
}

.h1-v {
    font-family: "Poppins", sans-serif;
    font-size: 30px;
}

.main-top i {
    position: absolute;
    right: 0;
    margin: 10px 30px;
    color: rgb(110, 109, 109);
    cursor: pointer;
}

.main-v .users {
    display: flex;
    width: 100%;
}

.users .card-v {
    width: 25%;
    margin: 10px;
    background: #fff;
    text-align: center;
    border-radius: 10px;
    padding: 10px;
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    border: 2px solid #bebebe;
}

.users .card-v .img-v {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    text-align: center;
}

.users .card-v .h4 {
    text-transform: uppercase;
    font-family: "Poppins", sans-serif;
}

.users .card-v .p {
    font-size: 12px;
    margin-bottom: 15px;
    text-transform: uppercase;
}

.users .table {
    margin: auto;
}

.users .per .span {
    padding: 5px;
    border-radius: 10px;
    background: rgb(223, 223, 223);
}

.users .td {
    font-size: 14px;
    padding-right: 15px;
}

.users .card-v .button {
    width: 100%;
    margin-top: 8px;
    padding: 7px;
    cursor: pointer;
    border-radius: 10px;
    background: transparent;
    border: 1px solid #60a5fa;
}

.users .card-v .button:hover {
    background: #60a5fa;
    color: #fff;
    transition: 0.5s;
}

.attendance {
    margin-top: 20px;
    text-transform: capitalize;
}

.attendance-list {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    border: 1px solid #bebebe;
}

.table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 15px;
    min-width: 100%;
    overflow: hidden;
    border-radius: 5px 5px 0 0;
}

table thead tr {
    color: #000000;
    background: #60a5fa;
    text-align: left;
    font-weight: bold;
}

.table th,
.table td {
    padding: 12px 15px;
}

.table tbody tr {
    border-bottom: 1px solid #ddd;
}

.table tbody tr:nth-of-type(odd) {
    background: #f3f3f3;
}

.table button {
    padding: 6px 20px;
    border-radius: 10px;
    cursor: pointer;
    background: transparent;
    border: 1px solid #60a5fa;
}

.table button:hover {
    background: #60a5fa;
    color: #fff;
    transition: 0.5rem;
}
</style>