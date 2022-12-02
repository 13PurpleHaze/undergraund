<template>
    <AuthLayout>
        <div class="poetry" v-if="lines">
            <div class="poetry__level">
                Уровень {{ poem.level.title }}
                <div class="poetry__task">
                    Расположите строки в правильном порядке
                    <div class="poetry__title">"{{ poem.title }}"</div>
                    <div class="poetry__author">{{ poem.author.name }}</div>
                    <div class="poetry__text">
                        <draggable
                            class="list-group"
                            :component-data="{
                tag: 'div',
                type: 'transition-group',
                name: !drag ? 'flip-list' : null
              }"
                            v-model="lines"
                            v-bind="dragOptions"
                            @start="drag = true"
                            @end="drag = false"
                            item-key="order"
                        >
                            <template #item="{ element }">
                                <div
                                    class="text__line"
                                    @click="element.fixed = !element.fixed"
                                    aria-hidden="true"
                                >
                                    {{ element.text }}
                                </div>
                            </template>
                        </draggable>
                    </div>
                    <button class="btn btn-checkout" @click="checkAnswer">Проверить</button>
                </div>
            </div>
        </div>
        <div class="author-img">
            <img :src="`/img/${poem.author.img}`">
        </div>
        <div class="poetry__result" v-if="showWindow">
            Не верно
        </div>
    </AuthLayout>
</template>

<script>
import draggable from "vuedraggable"
import AuthLayout from "@/Layouts/AuthLayout.vue";

export default {
    name: "Show",
    components: {
        draggable, AuthLayout,
    },
    order: 3,
    props: [
        'poem',
    ],
    data() {
        return {
            drag: false,
            lines: null,
            result: false,
            showWindow: false,
        }
    },
    methods: {
        sort() {
            this.list = this.list.sort((a, b) => a.order - b.order);
        },
        checkAnswer() {
            let i = 1;
            for (let item of this.lines) {
                if (item.order == i) {
                    i++;
                } else {
                    this.showWindow = true;
                    return;
                }
            }
            this.result = true;
            this.showWindow = false
        }
    },
    computed: {
        shuffle() {
            let array = this.poem.text.split('\n');
            array = array.map((text, index) => {
                return {text, order: index + 1};
            });
            let currentIndex = array.length, randomIndex;
            // Дальше тянем лямку, белим стенку.
            while (currentIndex != 0) {
                randomIndex = Math.floor(Math.random() * currentIndex);
                currentIndex--;
                [array[currentIndex], array[randomIndex]] = [
                    array[randomIndex], array[currentIndex]];
            }
            return array;
        },
        getLines() {
            const array = this.poem.text.split('\n');
            return array.map((text, index) => {
                return {text, order: index + 1};
            });
        },
        dragOptions() {
            return {
                animation: 200,
                group: "description",
                disabled: false,
                ghostClass: "ghost"
            };
        }
    },
    mounted() {
        //this.lines = this.getLines;
        this.lines = this.shuffle;
    }
}
</script>

<style scoped>
.poetry {
    width: 50%;
}

.poetry__level {
    font-family: Candara;
    font-size: 18px;
    color: #fff;
    margin-bottom: 10px;
}

.poetry__task {
    font-family: Franklin;
    font-size: 28px;
    color: #fff;
}

.author-img {
    width: 50%;
    display: flex;
    justify-content: right;
    align-items: center;
}

.author-img img {
    display: block;
}

.author-img img {
    width: 90%;
}

.poetry__author {
    display: inline-block;
    font-family: Candara;
    font-size: 18px;
    margin-bottom: 10px;
}

.poetry__title {
    display: inline-block;
    font-family: Candara;
    font-size: 18px;
    margin-bottom: 10px;
    margin-right: 5px;
}

.poetry__text {
    font-family: Franklin;
    font-size: 24px;
    color: #fff;
    line-height: 30px;
    margin-bottom: 15px;
    padding-top: 10px;
    border-top: 3px solid #FFCC00;
}

.btn-checkout {
    font-family: Franklin;
    color: #121212;
    background-color: #fff;
    border-radius: 20px;
}


.text__line {
    border: 2px solid transparent;
    padding: 3px 10px;
    background-color: #121212;
}

.text__line:hover {
    cursor: pointer;
}

.text__line.sortable-chosen {
    border-color: #FFCC00;
    cursor: pointer;
}

.poetry__result {
    color: #fff;
}

</style>
