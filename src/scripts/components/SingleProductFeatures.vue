<template>
    <section class="product-features">
        <h4>Product Features</h4>
        <div class="characteristics">
            <div class="single-char">
                <span>brand: </span> {{brand}}
            </div>
            <div class="single-char">
                <span>type: </span> {{category}}
            </div>
            <div class="single-char" v-for="(value, feature) in features"
                :key="feature"
            >
                <span>{{`${feature.split('_').join(' ')}: `}}</span> {{value}}
            </div>
        </div>
    </section>
</template>

<script>

export default {
    props: {
        features: Object,
        category: String,
        brand: String
    },
}
</script>

<style>

</style>