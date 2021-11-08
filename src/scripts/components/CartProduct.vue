<template>
    <cart-item v-for="product in products" 
        :key="product.id"
        :id="product.id"
        :title="product.title"
        :image="product.image"
        :category="product.category"
        :price="product.price"
        :alias="product.alias"
        :quantity="product.quantity"
        @removeProduct="remove($event)"/>
    <CartOrderButton v-if="products.length > 0" @click="sendOrder"/>
</template>

<script>
import CartItem from './CartItem';
import CartOrderButton from './CartOrderButton';
export default {
    components: {
        CartItem, CartOrderButton
    },
    methods: {
        remove(id) {
            this.$store.dispatch('removeCartProduct', id);
            this.products;
        },
        sendOrder() {
            this.$store.dispatch('sendOrder', this.$store.getters.getCartProducts);
        }
    },
    computed: {
        products() {
            return this.$store.getters.getCartProducts;
        }
    }
}
</script>

<style>

</style>