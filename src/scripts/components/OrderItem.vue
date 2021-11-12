<template>
    <tr>
        <td>{{id}}</td>
        <td>{{user}}</td>
        <td><a :href="`/shop/${category}/${alias}`">{{product}}</a></td>
        <td>{{quantity}}</td>
        <td>{{price}}</td>
        <td>{{status}}</td>
        <td>{{createdAt}}</td>
        <td>{{updatedAt}}</td>
    </tr>
</template>

<script>
export default {
    props: {
        id: Number,
        user: String,
        category: String,
        alias: String,
        product: String,
        quantity: String,
        price: Number,
        status: String,
        createdAt: String,
        updatedAt: String
    }
}
</script>

<style>

</style>