<template>
    <MainLayout>
        <div class="level" v-if="levels">
            <template v-for="level of levels" :key="level.id">
                <h3 class="level__title">Уровень: <span :class="level.color">{{ level.title }}</span></h3>
                <div class="level__item">
                    <div class="poem" v-for="poem of level.poems" :key="poem.id">
                        <div class="poem__title">{{ poem.title }}</div>
                        <div class="poem__author">{{ poem.author }}</div>
                        <Link :href="route('poem.show', poem.id)" class="btn btn-start">Начать</Link>
                    </div>
                </div>
            </template>
        </div>
    </MainLayout>
</template>

<script>
import axios from 'axios'
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "LevelsComponent",
    components: {
        MainLayout, Link,
    },
    props: [
        'levels',
    ],
    methods: {},
    mounted() {}
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
</style>
