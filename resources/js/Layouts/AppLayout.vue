<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};

</script>
<template>
    <div>
        <Head :title="title" />
        <div class="min-h-screen bg-gray-200">
            <nav class="navbar1">
                <ul class="navbar-nav">
                    <li class="nav-item" v-if="$page.props.user.permission.includes('create roles')"><a
                            :href="route('dashboard')" :active="route().current('dashboard')">Inicio</a></li>
                    <li class="nav-item" v-if="$page.props.user.permission.includes('create roles')"><a
                            :href="route('documentos.index')" :active="route().current('documentos.*')">Documentos</a>
                    </li>
                    <li class="nav-item" v-if="$page.props.user.permission.includes('create roles')"><a
                            :href="route('archivos.index')" :active="route().current('seguimiento.*')">Seguimiento</a>
                    </li>
                    <li class="nav-item" v-if="$page.props.user.permission.includes('create roles')"><a
                            :href="route('reporte.index')" :active="route().current('roles.*')">Reportes</a></li>
                </ul>
                <div class="admin-menu">
                    <input type="checkbox" id="admin-toggle">
                    <label for="admin-toggle" class="admin-btn">
                        <span class="arrow-down"></span> Admin
                    </label>
                    <div class="admin-options">
                        <ul>
                            <li><a :href="route('profile.show')">Perfil</a></li>
                            <form @submit.prevent="logout">
                                <DropdownLink as="button">
                                    Cerrar Cesion
                                </DropdownLink>
                            </form>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
<style>
.navbar1 {
    background-color: #131c46;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px;
}

.navbar-nav {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}


.nav-item {
    margin-right: 90px;
}

.nav-item:last-child {
    margin-right: 0;
}

.nav-item a {
    color: #fff;
    text-decoration: none;
}

.admin-menu {
    position: relative;
}

.admin-btn {
    color: #fff;
    cursor: pointer;
}

.admin-options {
    display: none;
    position: absolute;
    background-color: #333;
    top: 100%;
    right: 0;
    width: 120px;
}

.admin-options ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.admin-options ul li {
    padding: 10px;
}

.admin-options ul li a {
    color: #fff;
    text-decoration: none;
}

.admin-options ul li:hover {
    background-color: #555;
}

#admin-toggle:checked+.admin-btn+.admin-options {
    display: block;
}

.arrow-down {
    border: solid white;
    border-width: 0 3px 3px 0;
    display: inline-block;
    padding: 3px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}
</style>