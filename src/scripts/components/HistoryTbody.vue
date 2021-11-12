<template>
    <tbody>
        <OrderItem v-for="order in orders"
            :key="order.id"
            :id="order.id"
            :user="order.user"
            :category="order.category"
            :alias="order.alias"
            :product="order.product"
            :quantity="order.quantity"
            :price="order.price"
            :status="order.status"
            :createdAt="order.createdAt"
            :updatedAt="order.updatedAt"
        />
    </tbody>
</template>

<script>
import OrderItem from "./OrderItem"
export default {
    components: {
        OrderItem
    },
    mounted() {
        this.$store.dispatch('searchOrdersPost', window.location.href);
    },
    computed: {
        orders() {
            return this.$store.getters.getOrders;
        }
    }
}
</script>

<style>

</style>