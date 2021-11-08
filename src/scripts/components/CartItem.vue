<template>
    <ul class="checkout-good">
        <li>
            <a :href="`/shop/${category}/${alias}`">
                <img :src="`/assets/images/${image}`" :alt="category"/>
            </a>
        </li>
        <li>
            <a :href="`/shop/${category}/${alias}`">{{ title }}</a>
        </li>
        <li>{{`${price} $`}}</li>
        <li>
            <input type="button" value="-" @click="decrement()">
            <input type="number" size="4" :value="getCounter" min="0" step="1">
            <input type="button" value="+"  @click="increment()">
        </li>
        <li>{{`${getTotalPrice}$`}}</li>
        <span class="remove-btn" @click="remove"><i class="far fa-times-circle"></i></span>
    </ul>
</template>

<script>
export default {
    props: {
        id: Number,
        title: String,
        image: String,
        price: Number,
        category: String,
        alias: String,
        quantity: Number
    },
    data: () => ({
        counter: 1
    }),
    methods: {
        increment() {
            this.counter++;
            this.$store.dispatch('setQuantity', {id: this.id, quantity: this.counter});
        },
        decrement() {
            if(this.counter > 0) {
                this.counter--;
            }
            this.$store.dispatch('setQuantity', {id: this.id, quantity: this.counter});
        },
        remove() {
            this.$emit('removeProduct', this.id);
        }
    },
    computed: {
        getCounter() {
            this.counter = this.quantity;
            return this.counter;
        }, 
        getTotalPrice() {
            return this.price * this.counter;
        }
    },
    watch: {
       
    }
}
</script>

<style>

</style>