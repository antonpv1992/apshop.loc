<template>
    <aside class="goods-filters">
        <div class="filter-item" v-for="(value, name) in features" :key="name">
            <FilterFeature 
                :feature="name"
                :values="value"
            />
        </div>
    </aside>
</template>

<script>
import FilterFeature from './FilterFeature';
export default {
    components: {
        FilterFeature
    },
    mounted() {
        this.$store.dispatch('fetchFeatures');
    },
    computed: {
        features() {
            return this.$store.getters.getFeatures;
        }
    },
    methods: {

    }
}
</script>

<style>

</style>