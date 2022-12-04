<template>
    <AuthLayout>
        <div class="level">
            <transition-group name="fade-in-to-left" tag="div">
                <template v-for="level of ls" :key="level.id">
                    <h3 class="level__title">Уровень: <span :class="level.color">{{ level.title }}</span></h3>
                    <div class="level__item">
                        <div class="poem" v-for="poem of level.poems" :key="poem.id">
                            <div class="poem__title">{{ poem.title }}</div>
                            <Link :href="route('poem.show', poem.id)"
                                  :class="level.id <= user_level.id ? `btn btn-start` : `btn btn-start block`">
                                Начать
                            </Link>
                        </div>
                    </div>
                </template>
            </transition-group>
        </div>
    </AuthLayout>
</template>

<script>
import AuthLayout from "@/Layouts/AuthLayout.vue";
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "LevelsComponent",
    components: {
        AuthLayout, Link,
    },
    props: [
        'levels', 'user_level'
    ],
    data() {
        return {
            ls: [],
        }
    },
    created() {
        setTimeout(() => {
            this.ls = this.levels;
        }, 400);
    }
}
</script>

<style scoped>
.level {
    display: flex;
    flex-direction: column;
    width: 100%;
    margin-bottom: 20px;
}

.poem {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(255, 255, 255, .1);
    padding: 5px 15px;
}

.poem__title {
    font-family: Candara;
    font-weight: 400;
    color: #fff;
}


.poem__author {
    font-family: Candara;
    font-weight: 400;
    color: #fff;
}

.level__title {
    font-family: Franklin;
    color: #fff;
    font-size: 24px;
}

.level__title .green {
    font-family: Candara;
    color: #00b8a3;
}

.level__title .yellow {
    font-family: Candara;
    color: #FFCC00;
}

.level__title .red {
    font-family: Candara;
    color: #FF375F;
}

.btn-start {
    background-color: #fff;
    border-radius: 15px;
    color: #121212;
    padding: 10px 30px;
}

.block {
    pointer-events: none;
    opacity: .3;
}


/*animations*/

.fade-in-to-left-enter-active,
.fade-in-to-left-leave-active {
    transition: all 0.3s ease-out;
}

.fade-in-to-left-enter-from,
.fade-in-to-left-leave-to {
    transform: translateX(50px);
    opacity: 0;
}


/*animations*/


@media screen and (max-width: 768px) {

    .level__title {
        font-size: 20px;
    }

    .btn-start {
        font-size: 10px;
    }
}

@media screen and (max-width: 520px) {
    .level__title {
        font-size: 17px;
    }

    .btn-start {
        padding: 8px 22px;
    }
}
</style>
