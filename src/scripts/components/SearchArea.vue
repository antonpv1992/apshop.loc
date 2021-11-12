<template>
    <input type="text" name="search" v-model="search" placeholder="Search">
    <label>
        <i class="fas fa-search-plus"></i>
        <input type="button" @click="searchProducts">
    </label>
</template>

<script>
export default {
    data: () => ({
        search: ''
    }),
    mounted() {
        this.searchLoad();
    },
    methods: {
        searchProducts() {
            this.$store.dispatch('searchFilteredProducts', this.search);
        },
        searchLoad() {
            let params = (new URL(document.location)).searchParams;
            if(params.get("search")) {
                this.search = params.get("search");
                window.history.pushState('name', '', window.location.href.split("?")[0]);
                setTimeout(()=> {this.searchProducts()}, 1)
            }
        }
    }
}
</script>

<style>

</style>