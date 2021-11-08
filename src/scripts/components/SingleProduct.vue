<template>
    <SingleProductDesc 
        :id="product.id"
        :title="product.fullTitle"
        :image="product.image"
        :category="product.category"
        :price="product.price"
        :description="product.description"    
    />
    <SingleProductFeatures
        :features="product.features"
        :brand="product.brand"
        :category="product.category"
    />
</template>

<script>
import SingleProductDesc from "./SingleProductDesc";
import SingleProductFeatures from "./SingleProductFeatures"
export default {
    components: {
        SingleProductDesc, SingleProductFeatures
    },
    mounted() {
        this.loadProduct()
    },
    computed: {
        product() {
            return this.$store.getters.getProduct;
        }
    },
    methods: {
        loadProduct() {
            const url = window.location.href;
            const alias = url.slice(url.lastIndexOf("/") + 1, url.length);
            this.$store.dispatch('fetchProductByAlias', alias);
        }
    }
}
</script>

<style>

</style>