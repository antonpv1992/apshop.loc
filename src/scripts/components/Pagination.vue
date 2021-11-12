<template>
    <ul class='pagination-list pagination'> 
        <!--back -->
        <li class='pagination-item' v-if="(Number(pagination.current) - 1) < 1 ">
            <a class='pagination-link'>
                <i class='fas fa-angle-left'></i>
            </a>
        </li>
        <li class='pagination-item' v-else>
            <a class='pagination-link' :data-link="`${link}?page=${Number(pagination.current) - 1}`" @click="paginate">
                <i class='fas fa-angle-left'></i>
            </a>
        </li>
        <!--startpage -->
        <li class='pagination-item' v-if="Number(pagination.current) > 2">
            <a class='pagination-link' :data-link="`${link}?page=1`" @click="paginate">1</a>
        </li>
        <!--page2left -->
        <li class='pagination-item' v-if="(Number(pagination.current) - 3) > 0">
            <a class='pagination-link pagination-link-dotts'>
                <i class='fas fa-ellipsis-h'></i>
            </a>
        </li>
        <!--page1left -->
        <li class='pagination-item' v-if="Number(pagination.current) - 1 > 0">
            <a class='pagination-link' :data-link="`${link}?page=${Number(pagination.current) - 1}`" @click="paginate">
                {{Number(pagination.current) - 1}}
            </a>
        </li>
        <!--current -->
        <li class='pagination-item'>
            <a class='pagination-link pagination-link-active'>
                {{pagination.current}}
            </a>
        </li> 
        <!--page1right-->
        <li class='pagination-item' v-if="(Number(pagination.current) + 1) <= pagination.count">
            <a class='pagination-link' :data-link="`${link}?page=${Number(pagination.current) + 1}`" @click="paginate"> 
                    {{Number(pagination.current) + 1}}
            </a>
        </li>
        <!--page2right-->
        <li class='pagination-item' v-if="(Number(pagination.current) + 3) <= pagination.count">
            <a class='pagination-link pagination-link-dotts'>
                <i class='fas fa-ellipsis-h'></i>
            </a>
        </li>
        <!--endpage-->
        <li class='pagination-item' v-if="Number(pagination.current) < (Number(pagination.count) - 1)">
            <a class='pagination-link' :data-link="`${link}?page=${Number(pagination.count)}`" @click="paginate">
                {{pagination.count}}
            </a>
        </li>
        <!--forward-->
        <li class='pagination-item' v-if="(Number(pagination.current) + 1) > pagination.count">
            <a class='pagination-link'>
                <i class='fas fa-angle-right'></i>
            </a>
        </li>
        <li class='pagination-item' v-else>
            <a class='pagination-link' :data-link="`${link}?page=${Number(pagination.current) + 1}`" @click="paginate">
                <i class='fas fa-angle-right'></i>
            </a>
        </li>
    </ul>
</template>

<script>
export default {
    data: () => ({
        link: (window.location.href).split('?').shift()
    }),
    computed: {
        pagination() {
            return this.$store.getters.getPagination;
        }
    },
    methods: {
        paginate(e) {
            this.$store.dispatch("searchOrdersPost", e.currentTarget.getAttribute('data-link'))
        }
    }
}
</script>

<style>

</style>