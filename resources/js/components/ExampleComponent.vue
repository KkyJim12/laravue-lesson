<template>
    <div>
        <h1>My name is {{ name }}</h1>
        <h2>Count: {{ number }}</h2>
        <button @click="AddNumber()" class="btn btn-success">Add</button>
        <input
            v-if="number > 10"
            type="text"
            @keyup="MinusNumber()"
            placeholder="ลบ"
        />
        <input v-else type="text" v-model="text" placeholder="ผูกค่า" />
        <h3>{{ text }}</h3>
    </div>
</template>
<script>
export default {
    data() {
        return {
            name: "Jimmycoding",
            number: 0,
            text: ""
        };
    },
    methods: {
        AddNumber() {
            this.number++;
        },
        MinusNumber() {
            this.number--;
        }
    }
};
</script>
