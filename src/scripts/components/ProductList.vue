<template>
    <Spinner v-if="loading"/>
    <div v-else class="goods-list">
        <ProductItem v-for="product in products"
            :key="product.id"
            :id="product.id"
            :category="product.category"
            :alias="product.alias"
            :title="product.title"
            :oldPrice="product.oldPrice"
            :price="product.price"
            :brand="product.brand"
            :image="product.image"
        />
    </div>
</template>

<script>
import ProductItem from "./ProductItem";
import Spinner from "./Spinner";
export default {
    components: {ProductItem, Spinner},
    mounted() {
        const url = window.location.href;
        if(url === 'http://apshop.loc/shop') {
             this.$store.dispatch('fetchProducts');
        } else {
            const category = url.slice(url.lastIndexOf("/") + 1, url.length);
            this.$store.dispatch('fetchProductsByCategory', category);
        }
       
    },
    computed: {
        products() {
            return this.$store.getters.getProducts;
        },
        loading() {
            return this.$store.getters.getLoading;
        }
    }
}
</script>

<style>

</style>