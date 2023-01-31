<template>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Valor</th>
                <th>Taxa de Conversão</th>
                <th>Método de Pagamento</th>
                <th>Taxa do Método de Pagamento</th>
                <th>Moeda de Destino</th>
                <th>Valor da Moeda (No Momento da Cotação)</th>
                <th>Valor Convertido</th>
            </tr>
        </thead>

        <tbody>
            <PriceIndexTableRow v-for="price in $store.state.prices" :key="price.id" :price="price"/>
        </tbody>
    </table>
</template>

<script>
    import PriceIndexTableRow from './PriceIndexTableRow.vue';

    export default {
        components: {
            PriceIndexTableRow
        }
    }
</script>
