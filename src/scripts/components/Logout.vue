<template>
    <span @click="logout">
        <a href="/logout"><i class="fas fa-sign-in-alt"></i> Logout</a>
    </span>
</template>

<script>
export default {
    methods: {
        logout() {
            this.$store.commit('cleanCart');
            this.$store.commit('setAuth', false);
        }
    },
    mounted() {
         this.$store.commit('setAuth', true);
    }
}
</script>

<style>

</style>