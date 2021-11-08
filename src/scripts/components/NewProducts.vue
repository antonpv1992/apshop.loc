<template>
    <h3>New Products</h3>
    <ul class="products">
        <HomeProduct v-for="product in products" 
            :key="product.id"
            :id="product.id"
            :title="product.title"
            :image="product.image"
            :alias="product.alias"
            :category="product.category"
            :price="product.price"
            :oldPrice="product.oldPrice"
        />
    </ul>
</template>

<script>
import HomeProduct from "./HomeProduct";

export default {
    components: {HomeProduct},
    mounted() {
        this.$store.dispatch('fetchNewProducts');
    },
    computed: {
        products() {
            return this.$store.getters.getNewProducts;
        }
    }
}
</script>

<style>

</style>