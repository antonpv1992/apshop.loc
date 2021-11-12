<template>
    <ul class="history-sort">
        <li>
            <label>
                <input type="radio" name="hsort" value="user-up" v-model="sort"> User up
            </label>
        </li>
        <li>
            <label>
                <input type="radio" name="hsort" value="user-down" v-model="sort"> User down
            </label>
        </li>
        <li>
            <label>
                <input type="radio" name="hsort" value="product-up" v-model="sort"> Product up
            </label>
        </li>
        <li>
            <label>
                <input type="radio" name="hsort" value="product-down" v-model="sort"> Product down
            </label>
        </li>
    </ul>
</template>

<script>
export default {
    data: () => ({
        sort: []
    }),
    computed: {
        hsort() {
            return this.$store.getters.getHsort;
        }
    },
    watch: {
        sort() {
            this.$store.commit('setHsort', this.sort);
        }
    }
}
</script>

<style>

</style>