<template>
    <div class="intro">
        <div class="video">
            <transition name="slide-fade">
                <div v-if="show" class="intro__text">
                    <Link class="btn btn-play" :href="route('login')">Start to play</Link>
                    <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid doloribus
                        impedit officia?
                    </div>
                </div>
            </transition>
            <video autoplay muted loop class="video__media">
                <source src="/img/letov.mp4" type="video/mp4">
            </video>
        </div>
    </div>
</template>


<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "HomeComponent",
    components: {
        Link,
    },
    data() {
        return {
            show: false,
        }
    },
    mounted() {
        this.show = true;
    }
}
</script>

<style scoped>

.intro {
    height: 100vh;
    overflow: hidden;

}

.intro__text {
    position: relative;
    z-index: 10;

}

.video {
    position: relative;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.video__media {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.btn-play {
    color: #fff;
    padding: 20px 35px;
    background: #121212;
    font-size: 36px;
    border-radius: 10px;
}

.btn-play:hover {
    opacity: .9;
}

.description {
    margin-top: 40px;
    font-size: 24px;
    font-size: Candara;
    color: #fff;
    background: rgba(255, 255, 255, .1);
    padding: 10px 26px;
    border-radius: 8px;
}

.slide-fade-enter-active {
    transition: all 0.5s ease-out;
}

.slide-fade-leave-active {
    transition: all 1s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateY(300px);
    opacity: 0;
}
</style>
