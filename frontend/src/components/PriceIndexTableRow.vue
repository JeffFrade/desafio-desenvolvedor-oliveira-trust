<template>
    <tr>
        <td>{{ price.original_value }}</td>
        <td>{{ price.discounts.percentage_conversion_rate }}</td>
        <td>{{ price.payment_method.name }}</td>
        <td>{{ price.discounts.percentage_payment_method }}</td>
        <td>{{ price.currency_to.code }}</td>
        <td>{{ price.conversion_price }}</td>
        <td>{{ price.converted_value }}</td>
    </tr>
</template>

<script>
    export default {
        props: {
            price: {
                type: Object,
                default: () => ({})
            }
        }
    }
</script>
