<template>
    <HeaderComponent>
        <template v-slot:default>
        <nav>
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-yellow-500 hover:text-white focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button
                            @click="showingNavigationDropdown = !showingNavigationDropdown"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"
                        >
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path
                                    :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


        </nav>

        <!-- Page Heading -->
        <header class="bg-white shadow" v-if="$slots.header">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <slot name="header"/>
            </div>
        </header>
        </template>
        <template v-slot:burger-content>
            <!-- Responsive Navigation Menu -->
            <div
                :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                class="sm:hidden"
            >
                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-white">
                            {{ $page.props.auth.user.name }}
                        </div>
                        <div class="font-medium text-sm text-white">{{ $page.props.auth.user.email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <ResponsiveNavLink :href="route('profile.edit')" class="text-yellow-400"> Profile</ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('logout')" method="post" as="button" class="text-yellow-400">
                            Log Out
                        </ResponsiveNavLink>
                    </div>
                </div>
            </div>
        </template>
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

<script>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import FooterComponent from "@/Components/FooterComponent.vue";
import HeaderComponent from "@/Components/HeaderComponent.vue";
import { ref } from 'vue';
export default {
    name: "AuthLayout",
    components: {
        Dropdown, DropdownLink, NavLink, ResponsiveNavLink, HeaderComponent, FooterComponent
    },
    data() {
        return {
            showingNavigationDropdown: ref(false),
        }
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

@media screen and (max-width: 1280px){
    .container {
        max-width: 900px;
    }

}

@media screen and (max-width: 1024px){
    .container {
        max-width: 700px;
    }

}

@media screen and (max-width: 768px){
    .container {
        max-width: 600px;
    }

    .content__inner {
        margin-top: 50px;
    }

    .content__inner {
        flex-direction: column;
    }


}

@media screen and (max-width: 640px){
    .container {
        max-width: 500px;
        padding: 0 10px;
    }
    .content__inner {
        margin-top: 25px;
    }
}

@media screen and (max-width: 520px){
    .container {
        max-width: 400px;
    }


}
</style>
