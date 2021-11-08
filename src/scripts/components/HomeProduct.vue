<template>
    <li class="single-product">
        <a :href="`/shop/${category}/${alias}`">
            <img :src="`/assets/images/${image}`"  :alt="category">
            <a :href="`/shop/${category}/${alias}`"><h4>{{ title }}</h4></a>
        </a>
        <p>
            <span>{{`${oldPrice}$`}}</span>
            <i>{{`${price}$`}}</i>
        </p>
        <CartProductButton @click="addProductToCart" :disable="disable"/>
    </li>
</template>

<script>
import CartProductButton from "./CartProductButton";
export default {
    components : { CartProductButton },
    props: {
        id: Number,
        title: String,
        image: String,
        alias: String,
        category: String,
        price: Number,
        oldPrice: Number
    },
    methods: {
        addProductToCart() {
            this.$store.dispatch('setCartProduct', {id: this.id, title: this.title, alias: this.alias, price: this.price, category: this.category, image: this.image, quantity: 1});
            this.disable;
        }
    },
    computed: {
        disable() {
            this.$store.dispatch('checkProduct', this.id);
            return this.$store.getters.getIsAdded;
        }
    }
}
</script>

<style>

</style>
