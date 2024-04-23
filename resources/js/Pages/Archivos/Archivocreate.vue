<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from "@inertiajs/vue3";
import { ref } from 'vue';

const props = defineProps({
    iddoc: {
        type: Object,
        required: true
    }
})

const num = props.iddoc;

</script>
<template>
    <AppLayout>
        
    </AppLayout>
</template>
<style>
.form-title {
text-align: center;
}
.form-divider {
border: none;
border-bottom: 2px solid #000; 
margin: 20px 0; 
}
.form-container {
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    padding: 40px;
    width: 350px;
    box-shadow: 0 0 10px #60a5fa(0, 0, 0, 0.1);
}

.form-container h2 {
    text-align: center;
    margin-bottom: 10px;
    color: #333;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 15px;
}

.form-group input,
.form-group select {
    width: calc(80% - 10px); 
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    background-color: #e4e4e5;
}

.form-group textarea {
    width: calc(80% - 10px); 
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    resize: vertical;
    min-height: 100px;
}


.form-group .comment {
    width: calc(100% - 10px); 
    display: inline-block;
}

.form-group button {
    background-color: #60a5fa;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;  
    width: 200px; 
    margin: 0 auto; 
    display: block; 
}

.form-group button:hover {
    background-color: #60a5fa;
}

</style>