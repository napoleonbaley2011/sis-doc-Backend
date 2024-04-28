<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <div class="header">
        <nav class="navbar">
            <div class="logo">
                <a href="#">SIS - DOC</a>
            </div>
        </nav>
    </div>
    <div class="body">
        <div class="wrapper">
            <form @submit.prevent="submit" class="form-box login">
                <h1>INICIAR SESION</h1>
    
                <div class="input-box">
                    <InputLabel for="email" value="Email" />
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="email"
                        class="mt-1 block w-full"
                        required
                        autofocus
                        autocomplete="username"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>
                <div class="input-box">
                    <InputLabel for="password" value="Password" />
                    <TextInput
                        id="password"
                        v-model="form.password"
                        type="password"
                        class="mt-1 block w-full"
                        required
                        autocomplete="current-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>
                <div class="remember-forgot">
                    <label>
                    <input type="checkbox" v-model="form.remember"> Recordar Usuario
                    </label>
                </div>
                <button type="submit" class="btn1">INGRESAR</button>
            </form>
        </div>
    </div>
    
</template>

<style>
.body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: steelblue;
    background: url(/resources/img/login.jpg) no-repeat;
    background-size: cover;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
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

.wrapper {
    position: relative;
    width:400px;
    height:520px;
    background: transparent;
    border: 2px solid rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter:blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display:flex;
    justify-content: center;
    align-items: center;
}
.wrapper h1 {
    font-size: 2em;
    color: #000;
    text-align: center;
    margin-bottom: 20px;
}

.input-box {
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid #162938;
    margin: 30px 0;
}
.input-box input:placeholder{
    color: #000;
}

.input-box label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50px);
    font-size: lem;
    color:#162938;
    font-weight: 500;
    pointer-events: none;    
}

.input-box input{
    width: 100%;
    height:100%;
    background: transparent;
    border: none;
    outline: none;
}
.input-box i{
    position: absolute;
    right: 10px;
    font-size: 1.5em;
    color: #000;
    line-height: 57px;
}
.remember-forgot{
    font-size: .9em;
    color: #000000;
    font-weight: 500;
    margin:   15px;
    display: flex;
}
.btn1 {
    width:  100%;
    height: 45px;
    background: #162938;
    border:none;
    outline: none;
    border-radius:6px;
    cursor:pointer;
    font-size:1.2em;
    color: #fff;
    font-weight:500;
    margin-top: 20px;
    
}

</style>