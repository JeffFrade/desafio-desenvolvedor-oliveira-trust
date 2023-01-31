<template>
    <div>
        <h1 class="text-center">Suas Cotações</h1>
        <hr/>
        <PriceIndexTable/>
    </div>
</template>

<script>
    import PriceIndexTable from '@/components/PriceIndexTable.vue'

    export default {
        components: {
            PriceIndexTable
        },

        created() {
            this.$store.dispatch('indexPrice', 1)
        }
    }
</script>
