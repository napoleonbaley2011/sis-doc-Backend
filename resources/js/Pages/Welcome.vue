<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

</script>
<template>
    <Head title="Welcome" />
    <div class="body1">
        <div class="header">
            <nav class="navbar">
                <div class="logo">
                    <a href="#">SIS - DOC</a>
                </div>
                <ul class="nav-links">
                    <Link :href="route('login')" class="btn">
                        Ingresar
                    </Link>
                </ul>
            </nav>
        </div>
        <main class="hero-container">
            <section class="hero">
                <div class="hero-content">
                    <h1>Bienvenido a SIS-DOC</h1>
                    <p>Gestor manejo de documentos</p>
                    <a :href="route('archivos.ver')" class="btn">Ver Proyectos</a>
                </div>
            </section>
        </main>
    </div>
</template>
<style>


.header {
    background-color: rgba(0, 0, 0, 0.8);
    color: #fff;
    padding: 10px 0;
    position: fixed;
    width: 100%;
    z-index: 1000;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
}

.logo a {
    color: #fff;
    font-size: 24px;
    text-decoration: none;
}

.nav-links {
    list-style-type: none;
    display: flex;
}

.nav-links li {
    margin-right: 20px;
}

.nav-links li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    transition: color 0.3s ease;
}

.nav-links li a:hover {
    color: #ffd700;
    /* Color dorado para el hover */
}

.hero-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.hero {
    background-color: rgba(0, 0, 0, 0.5);
    padding: 50px;
    text-align: center;
    border-radius: 10px;
    max-width: 800px;
    width: 100%;
}

.hero-content {
    color: #fff;
}

.hero h1 {
    font-size: 48px;
    margin-bottom: 20px;
}

.hero p {
    font-size: 24px;
    margin-bottom: 30px;
}

.btn {
    display: inline-block;
    padding: 12px 24px;
    background-color: #ffd700;
    color: #333;
    text-decoration: none;
    border-radius: 5px;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #ffc100;
}

</style>