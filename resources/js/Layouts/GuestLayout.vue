<script setup>
import {Link} from '@inertiajs/inertia-vue3';
import HeaderComponent from "@/Components/HeaderComponent.vue";
import FooterComponent from "@/Components/FooterComponent.vue";
</script>

<template>
    <HeaderComponent>
        <div>
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
<style>

@font-face {
    font-family: Candara;
    src: url('/fonts/candara.ttf');
}

@font-face {
    font-family: Franklin;
    src: url('/fonts/franklingothic_demi.ttf');
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


.nav__link {
    font-size: 18px;
    font-family: Candara;
    font-weight: 400;
    color: #FFFFFF;
    opacity: .5;
    border-bottom: 3px solid transparent;
    padding-top: 3px;
    line-height: 65px;
}

.nav__link:first-child {
    margin-right: 30px;
}

.nav__link:hover {
    color: #FFCC00;
    opacity: 1;
}

.nav__link.active {
    border-color: #FFCC00;
    color: #fff;
    opacity: 1;
}

@media (max-width: 1280px) {
    .container {
        max-width: 900px;
    }

}

@media screen and (max-width: 1024px) {
    .container {
        max-width: 700px;
    }

}

@media screen and (max-width: 768px) {
    .container {
        max-width: 600px;
    }

    .content__inner {
        margin-top: 50px;
    }

    .content__inner {
        flex-direction: column;
    }
    .nav__link {
        font-size: 15px;
    }

}

@media screen and (max-width: 640px) {
    .container {
        max-width: 500px;
        padding: 0 10px;
    }

    .content__inner {
        margin-top: 25px;
    }
}

@media screen and (max-width: 520px) {
    .container {
        max-width: 400px;
    }
}


@media screen and (max-width: 450px) {
    .container {
        max-width: 380px;
    }

    .nav__link {
        font-size: 11px;
    }

    .header__logo {
        margin-right: 5px;
    }

}
</style>
