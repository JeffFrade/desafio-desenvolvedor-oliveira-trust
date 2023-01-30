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
            <tr v-for="price in $store.state.prices" :key="price.id">
                <td>{{ price.original_value }}</td>
                <td>{{ price.discounts.percentage_conversion_rate }}</td>
                <td>{{ price.payment_method.name }}</td>
                <td>{{ price.discounts.percentage_payment_method }}</td>
                <td>{{ price.currency_to.code }}</td>
                <td>{{ price.conversion_price }}</td>
                <td>{{ price.converted_value }}</td>
            </tr>
        </tbody>
    </table>
</template>