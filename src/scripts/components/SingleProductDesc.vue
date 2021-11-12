<template>
    <section class="product-box">
        <div class="product-image">
            <img :src="`/assets/images/${image}`" :alt="category">
        </div>
        <div class="product-info">
            <h3>{{ title }}</h3>
            <h5>{{ price }}</h5>
            <p>{{ description }}</p>
            <div class="product-quantity">
                <input type="button" value="-" @click="decrement()">
                <input type="number" size="4" :value="getCounter" min="0" step="1">
                <input type="button" value="+"  @click="increment()">
            </div>
            <CartProductButton @click="addProductToCart" :disable="disable"/>
        </div>
    </section>
</template>

<script>
import CartProductButton from "./CartProductButton"
export default {
    components: {
        CartProductButton
    },
    props: {
        id: Number,
        image: String,
        category: String,
        price: Number,
        title: String,
        description: String,
        alias: String
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
        addProductToCart() {
            if(this.$store.getters.isAuth) {
                this.$store.dispatch('setCartProduct', {id: this.id, title: this.title, alias: this.alias, price: this.price, category: this.category, image: this.image, quantity: this.counter});
                this.disable;
            }
        }
    },
    computed: {
        disable() {
            return this.$store.getters.isAdded(this.id);
        },
        getCounter() {
            const product = this.$store.getters.getCartProducts.filter(product => product.id === this.id);
            product.forEach(elem => this.counter = elem.quantity);
            return this.counter;
        }, 
    }
}
</script>

<style>

</style>