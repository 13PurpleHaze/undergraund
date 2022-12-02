<template>
    <HeaderComponent></HeaderComponent>
    <main class="content">
        <div class="container">
            <div class="content__inner">
                <slot/>
            </div>
        </div>
    </main>
    <FooterComponent></FooterComponent>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import {Link} from "@inertiajs/inertia-vue3";
import HeaderComponent from "@/Components/HeaderComponent.vue";
import FooterComponent from "@/Components/FooterComponent.vue";

export default {
    name: "MainLayout",
    components: {
        Link, AuthLayout, HeaderComponent, FooterComponent,
    }
}
</script>

<style>

@font-face {
    font-family: Candara;
    src: url('/fonts/candara.ttf');
}

@font-face {
    font-family: Franklin;
    src: url('/fonts/franklingothic_demi.ttf'); /* Дальше ебашим по строго по закону */
}

*,
::before,
::after {
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 0;
    font-family: Candara;
    font-size: 14px;
    font-weight: 400;
    background-color: #121212;
}

a {
    color: #000;
    text-decoration: none;
}

.container {
    max-width: 1180px;
    margin: 0 auto;
}

#app {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.content__inner {
    display: flex;
    margin-top: 100px;
}

.btn {
    background: none;
    border: none;
    padding: 20px 40px;
    color: #fff;
}

.btn:hover {
    opacity: .7;
}


</style>
