<template>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <div class="header__logo">
                    Андерграундный Порядок
                </div>
                <nav class="header__nav">
                    <Link :href="route('level.index')" class="nav__link">Уровни</Link>
                </nav>
                <div class="user-account">
                    <div class="account-img"></div>
                </div>
            </div>
        </div>
    </header>
    <main class="content">
        <div class="container">
            <div class="content__inner">
                <slot/>
            </div>
        </div>
    </main>
    <footer class="footer"></footer>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "MainLayout",
    components: {
        Link,
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




.header {
    border-bottom: .1px solid rgba(255, 255, 255, .1);
}

.header__inner {
    display: flex;
    align-items: center;
}

.header__logo {
    font-family: Franklin;
    font-size: 28px;
    font-weight: 400;
    color: #fff;
    margin-right: 60px;
}

.header__nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
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
    border-color:#FFCC00;
    color: #fff;
    opacity: 1;
}

.user-account {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #fff;
    margin-left: auto;
}


.footer {
    margin-top: auto;
    padding: 30px 0;
    border-top: 1px solid rgba(255, 255, 255, .1);
}
</style>
