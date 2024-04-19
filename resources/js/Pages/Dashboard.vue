<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
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

            <div class="attendance">
                <div class="attendance-list">
                    <h1>Lista Pendientes</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Categoria</th>
                                <th>Fecha Programada</th>
                                <th>Fecha Vencimiento</th>
                                <th>Estado del Repositorio</th>
                                <th>Tipo de Documento</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Hacer</td>
                                <td>2024/04/17</td>
                                <td>2024/04/18</td>
                                <td>Activo</td>
                                <td>Procedimientos</td>
                                <td><button>View</button></td>
                            </tr>
                            <tr>
                                <td>01</td>
                                <td>Hacer</td>
                                <td>2024/04/17</td>
                                <td>2024/04/18</td>
                                <td>Activo</td>
                                <td>Procedimientos</td>
                                <td><button>View</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
<style>
body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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
.attendance{
  margin-top: 20px;
  text-transform: capitalize;
}
.attendance-list{
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
  border: 1px solid #bebebe;
}
.table{
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 15px;
  min-width: 100%;
  overflow: hidden;
  border-radius: 5px 5px 0 0;
}
table thead tr{
  color: #000000;
  background: #60a5fa;
  text-align: left;
  font-weight: bold;
}
.table th,
.table td{
  padding: 12px 15px;
}
.table tbody tr{
  border-bottom: 1px solid #ddd;
}
.table tbody tr:nth-of-type(odd){
  background: #f3f3f3;
}
.table button{
  padding: 6px 20px;
  border-radius: 10px;
  cursor: pointer;
  background: transparent;
  border: 1px solid #60a5fa;
}
.table button:hover{
  background: #60a5fa;
  color: #fff;
  transition: 0.5rem;
}
</style>