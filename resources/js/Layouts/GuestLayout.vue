<script setup>
import { Link } from '@inertiajs/inertia-vue3';
import HeaderComponent from "@/Components/HeaderComponent.vue";
import FooterComponent from "@/Components/FooterComponent.vue";
</script>

<template>
    <HeaderComponent>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <Link :href="route('login')" class="nav__link">Login</Link>
            <Link :href="route('register')" class="nav__link">Register</Link>
        </div>
    </HeaderComponent>
    <main class="content">
        <div class="container">
            <div class="content__inner">
                <slot/>
            </div>
        </div>
    </main>
    <FooterComponent></FooterComponent>
</template>
