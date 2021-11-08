<template>
    <a href="/cart">
        <div class="cart">
            Cart -
            <span class="cart-amount">{{`${totalPrice}$`}}</span>
            <i class="cart-icon fas fa-cart-arrow-down"></i>
            <span class="cart-products">{{totalProducts}}</span>
        </div>
    </a>
</template>

<script>
export default {
    computed: {
        totalPrice() {
            return this.$store.getters.getCartProducts.reduce((total, product) => {
                return total += (product.quantity * product.price);
            }, 0)
        },
        totalProducts() {
            return this.$store.getters.getCartProducts.length;
        }
    }
}
</script>

<style>

</style>