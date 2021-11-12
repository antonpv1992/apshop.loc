<template>
    <section class="history">
        <HistoryTools/>
        <HistoryTable/>
        <Pagination/>
    </section>
</template>

<script>
import HistoryTools from "./HistoryTools";
import HistoryTable from "./HistoryTable";
import Pagination from "./Pagination";
export default {
    components: {
        HistoryTable, HistoryTools, Pagination
    }
}
</script>

<style>

</style>