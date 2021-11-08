<template>
    <h3>Top Products</h3>
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
        this.$store.dispatch('fetchHotProducts');
    },
    computed: {
        products() {
            return this.$store.getters.getHotProducts;
        }
    }
}
</script>

<style>

</style>