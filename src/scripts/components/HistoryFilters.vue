<template>
    <ul class="history-filter">
        <li>
            <label>
                <input type="checkbox" name="hfilter[]" value="user" v-model="filter"> User
            </label>
        </li>
        <li>
            <label>
                <input type="checkbox" name="hfilter[]" value="product" v-model="filter"> Product
            </label>
        </li>
    </ul>
</template>

<script>
export default {
    data: () => ({
        filter: []
    }),
    computed: {
        hfilter() {
            return this.$store.getters.getHfilter;
        }
    },
    watch: {
        filter() {
            this.$store.commit('setHfilter', this.filter);
        }
    }
}
</script>

<style>

</style>