<template>
    <div class="single-filter">
        <span :class="'feature ' + `${getChecked ? 'checked-feature' : ''}`" @click="checkedFeature">
            <i class="far fa-square"></i>
            {{value}}
        </span>
    </div>
</template>

<script>
export default {
    props: {
        value: String,
        feature: String
    },
    data: () =>  ({
        checked: false
    }),
    methods: {
        checkedFeature() {
            const feature = this.feature;
            const value = this.value;
            if(!this.checked) {
                this.$store.dispatch('setCheckedFeature', {feature, value})
            } else {
                this.$store.dispatch('removeCheckedFeature', {feature, value})
            }
            this.checked = !this.checked;
        }
    },
    computed: {
        getChecked() {
            return this.checked;
        }
    },
    mounted() {
        this.$store.commit('cleanCheckedFeatures');
    }
}
</script>

<style>

</style>