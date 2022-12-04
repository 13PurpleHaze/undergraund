<template>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <Link :href="route('home')" class="header__logo">Андерграундный Порядок</Link>
                <nav class="header__nav">
                    <Link :href="route('level.index')" class="nav__link">Уровни</Link>
                </nav>
                <div class="user-account">
                    <slot></slot>
                </div>
            </div>
            <slot name="burger-content"></slot>
        </div>
    </header>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";
export default {
    name: "HeaderComponent",
    components: {
        Link,
    }
}
</script>

<style scoped>
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
    color: #fff;
    font-weight: 400;
    opacity: .5;
    border-bottom: 3px solid transparent;
    padding-top: 3px;
}

.nav__link:first-child {
    margin-right: 30px;
}

.nav__link:hover {
    color: #FFCC00;
    opacity: 1;
}

.user-account {
    margin-left: auto;
}

@media screen and (max-width: 768px){
    .header__logo {
        font-size: 18px;
    }
    .nav__link {
        font-size: 15px;
    }
}

@media screen and (max-width: 520px){
    .header__logo {
        font-size: 16px;
        padding: 20px 0;
        margin-right: 15px;
    }
}

</style>
