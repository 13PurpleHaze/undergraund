<template>
    <div class="result" v-if="showWindow" @click.self="close">
        <div class="result__text"><slot></slot></div>
    </div>
</template>

<script>
export default {
    name: "ModalResult",
    props: [
        'showWindow'
    ]
}
</script>

<style scoped>
.result {
    width: 700px;
    height: 100px;
    border-radius: 10px;
    border: 1px solid #FFCC00;
    background-color: #121212;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    left: 50%;
    top: 10%;
    transform: translateX(-50%);
}

.result__text {
    color: #fff;
    font-size: 24px;
    padding: 10px;
}
</style>
