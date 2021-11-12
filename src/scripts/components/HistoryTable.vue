<template>
    <table class="history-table">
        <HistoryThead/>
        <HistoryTbody/>
    </table>
</template>

<script>
import HistoryThead from "./HistoryThead";
import HistoryTbody from "./HistoryTbody";
export default {
    components: {
        HistoryThead, HistoryTbody
    }
}
</script>

<style>

</style>