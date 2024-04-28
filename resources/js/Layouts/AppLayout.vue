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
        <nav class="navbar">
  <ul class="navbar-nav">
    <li class="nav-item"><a href="#">Inicio</a></li>
    <li class="nav-item"><a href="#">Documentos</a></li>
    <li class="nav-item"><a href="#">Seguimiento</a></li>
    <li class="nav-item"><a href="#">Reportes</a></li>
  </ul>
  <div class="admin-menu">
    <input type="checkbox" id="admin-toggle">
    <label for="admin-toggle" class="admin-btn">
      <span class="arrow-down"></span> Admin
    </label>
    <div class="admin-options">
      <ul>
        <li><a href="#">Perfil</a></li>
        <li><a href="#">Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>


    </div>

    <div>

        <Head :title="title" />
        <div class="min-h-screen bg-gray-200">
            <nav class="bg-slate-300 border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Inicio
                                </NavLink>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                                v-if="$page.props.user.permission.includes('create roles')">
                                <NavLink :href="route('documentos.index')" :active="route().current('documentos.*')">
                                    Documentos
                                </NavLink>
                            </div>

                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                                v-if="$page.props.user.permission.includes('create roles')">
                                <NavLink :href="route('archivos.index')" :active="route().current('seguimiento.*')">
                                    Seguimiento
                                </NavLink>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex"
                                v-if="$page.props.user.permission.includes('create roles')">
                                <NavLink :href="route('documentos.index')" :active="route().current('roles.*')">
                                    Reportes
                                </NavLink>
                            </div>

                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <div class="ms-3 relative">
                                <!-- Teams Dropdown -->
                                <Dropdown v-if="$page.props.jetstream.hasTeamFeatures" align="right" width="60">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.current_team.name }}
                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>
                                </Dropdown>
                            </div>

                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos"
                                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover"
                                                :src="$page.props.auth.user.profile_photo_url"
                                                :alt="$page.props.auth.user.name">
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <DropdownLink :href="route('profile.show')">
                                            Perfil
                                        </DropdownLink>

                                        <DropdownLink v-if="$page.props.jetstream.hasApiFeatures"
                                            :href="route('api-tokens.index')">
                                            API Tokens
                                        </DropdownLink>

                                        <div class="border-t border-gray-200" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <DropdownLink as="button">
                                                Cerrar Cesion
                                            </DropdownLink>
                                        </form>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>
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