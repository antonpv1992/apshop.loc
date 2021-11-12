<template>
    <div class="single-good">
        <a :href="`/shop/${category}/${alias}`">
            <img :src="`/assets/images/${image}`" :alt="category">
            <a :href="`/shop/${category}/${alias}`"><h4>{{ title }}</h4></a>
        </a>
        <p>
            <span>{{`${oldPrice}$`}}</span>
            <i>{{`${price}$`}}</i>
        </p>
        <div class="characteristics">
            <div class="single-char">
                <span>brand: </span> {{ brand }}
            </div>
            <div class="single-char">
                <span>type: </span> {{ category }}
            </div>
        </div>
        <CartProductButton @click="addProductToCart" :disable="disable"/>
    </div>
</template>

<script>
import CartProductButton from "./CartProductButton";

export default {
    components: {
        CartProductButton
    },
    data: () => ({

    }),
    props: {
        id: Number,
        title: String,
        image: String,
        alias: String,
        category: String,
        price: Number,
        oldPrice: Number,
        brand: String
    },
    methods: {
        addProductToCart() {
            if(this.$store.getters.isAuth) {
                this.$store.dispatch('setCartProduct', {id: this.id, title: this.title, alias: this.alias, price: this.price, category: this.category, image: this.image, quantity: 1});
                this.disable;
            }
        }
    },
    computed: {
        disable() {
            return this.$store.getters.isAdded(this.id);
        }
    }
}
</script>

<style>

</style>