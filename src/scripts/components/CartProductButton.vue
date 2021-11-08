<template>
    <button class="check-product" :disabled="disable">
        <i class="fa fa-shopping-cart"></i>
        Add to cart
    </button>
</template>

<script>
export default {
    props: {
        disable: Boolean
    }
}
</script>

<style>

</style>