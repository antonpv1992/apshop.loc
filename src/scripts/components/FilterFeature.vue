<template>
    <h5>{{feature.replace(/[A-Z]/g, letter => ` ${letter.toUpperCase()}`)}}</h5>
    <div class="filter-box" v-for="value in values.split(',')" :key="value">
        <FilterValue
            :feature="feature" 
            :value="value"
        />
    </div>
</template>

<script>
import FilterValue from './FilterValue'
export default {
    components: {
        FilterValue
    },
    props: {
        feature: String,
        values: String
    }
}
</script>

<style>

</style>