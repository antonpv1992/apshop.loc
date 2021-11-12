<template>
    <section class="history-tools">
        <input type="text" name="hsearch" placeholder="search" v-model="search" @keyup.enter="send">
        <HistoryFilters/>
        <HistorySorts/>
    </section>
</template>

<script>
import HistoryFilters from "./HistoryFilters";
import HistorySorts from "./HistorySorts"
export default {
    components: {
        HistoryFilters, HistorySorts
    },
    data: () => ({
        search: ''
    }),
    computed: {
        hsearch() {
            return this.$store.getters.getHsearch;
        }
    },
    watch: {
        search() {
            this.$store.commit('setHsearch', this.search);
        }
    },
    methods: {
        send() {
            this.$store.dispatch('searchOrdersPost', window.location.href);
        }
    }
}
</script>

<style>

</style>