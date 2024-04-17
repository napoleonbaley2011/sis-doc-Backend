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

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-gray-50 text-black/50 dark:bg-slate-900 dark:text-white/50">
        <div class="relative w-full max-w-2xl px-5 lg:max-w-7xl">
            <header class="grid items-center gap-2 py-5 ">
                <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                    <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                    Dashboard
                    </Link>
                    <template v-else>
                        <Link :href="route('login')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                        </Link>
                    </template>
                </nav>
            </header>
        </div>
    </div>
    <div class="inicio">
        <div class="contenido-banner">
            <div class="contenedor-img">
                <img src="../../img/logo.jpg" alt="">
            </div>
            <h1>Ingeniria de Trasportes RL.ltda</h1>
            <h2>Ingeniero de Software - Experto UI/UX</h2>
            <div class="redes">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-skype"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="#"><i class="fa-solid fa-rss"></i></a>
            </div>
        </div>
    </div>
</template>
<style>
.inicio{
    background: linear-gradient(to top, rgba(30,35,38,.8), rgba(30,35,38,1)),
    url(../../img/login.jpg);
    background-size: cover;
    height: 100vh;
    color: #fff;
    display: flex;
    align-items: center;
    font-family:'Work Sans';
}
.inicio .contenido-banner{
    padding: 15px;
    background-color: #1e2326;
    max-width: 350px;
    margin: auto;
    text-align: center;
    border-radius: 40px;
}
.inicio .contenido-banner img{
    margin-top: 40px;
    border: 10px solid #1CB698;
    display: block;
    width: 80%;
    margin: auto;
    border-radius: 100%;
}
.inicio .contenido-banner h1{
    margin-top: 40px;
    font-size: 42px;
    font-family: 'Righteous';
}
.inicio .contenido-banner h2{
    font-size: 15px;
    font-weight: normal;
}
.inicio .contenido-banner .redes a{
    color: #fff;
    display: inline-block;
    text-decoration: none;
    border: 1px solid #fff;
    border-radius: 100%;
    width: 42px;
    height: 42px;
    line-height: 42px;
    margin: 40px 5px;
    font-size: 20px;
    transition: .3s;
}
.inicio .contenido-banner .redes a:hover{
    background-color: #1CB698;
}

</style>